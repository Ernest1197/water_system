<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use App\Payment;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user')->only(['store']); // client not allowed to create bill
    }

    // show unpaid bills
    public function index()
    {
        $bills = [];

        // show client his/her bills
        if (auth()->user()->role == 'client')
            $bills = Bill::latest()->where('client_id', auth()->id())->paginate(20);

        // show admin all bills
        else $bills = Bill::latest()->with('client')->paginate(20);

        return view('bills.index', compact('bills'));
    }

    // show paid bills
    public function unpaid() {
        $bills = [];

        // show client his/her bills
        if (auth()->user()->role == 'client')
            $bills = Bill::latest()->where([["client_id", auth()->id()],['paid', false]])->paginate(20);

        // show admin all bills
        else $bills = Bill::latest()->where('paid', false)->with('client')->paginate(20);

        return view('bills.index', compact('bills'));
    }

    // save payment from flutterwave
    public function pay(Request $request) {
        if ($request->status === 'successful') {
            $bill = Bill::findOrFail(ltrim($request->tx_ref, 'water-bill-'));
            $bill->update(['paid' => true]);

            Payment::create([
                'bill_id' => $bill->id,
                'client_id' => $bill->client_id,
                'method' => 'mobile-money',
                'amount' => $bill->bill_amount,
                'description' => "`status=$request->status,tx_ref=$request->tx_ref,transaction_id=$request->transaction_id`"
            ]);
        }

        return redirect()->route('bills.index');
    }

    // show user's bill
    public function show(User $user)
    {
        $bills = Bill::latest()->where('client_id', $user->id)->paginate(20);
        return view('bills.index', compact('bills', 'user'));
    }

    // add bill to user
    public function bill(User $user)
    {
        // find last user's bill
        $bill = Bill::latest()->where('client_id', $user->id)->first();
        $previous_reading = $bill ? $bill->present_reading : $user->first_meter_reading;

        return view('bills.user', compact(['user', 'previous_reading']));
    }

    // save bill
    public function store(Request $request)
    {
        $request->validate(['previous_reading' => 'required', 'present_reading' => 'required', 'price' => 'required']);
        $consumption = (float) $request->input('present_reading') - (float) $request->input('previous_reading');
        $price = (float) $request->input('price');

        if ($consumption <= 0)
            return back()->withErrors(['present_reading' => 'Present reading should be more than previous reading']);

        Bill::create([
            'previous_reading' => $request->input('previous_reading'),
            'present_reading' => $request->input('present_reading'),
            'consumption' => $consumption,
            'price' => $price,
            'bill_amount' => $consumption * $price,
            'client_id' => $request->input('client_id')
        ]);

        return redirect()->route('bills.index');
    }
}
