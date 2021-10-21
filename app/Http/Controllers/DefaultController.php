<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DefaultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user')->only(['userDelete', 'users', 'clients']);
        $this->middleware('admin')->only(['users', 'userEdit', 'userUpdate']);
    }

    public function show(User $user)
    {
        return $user;
    }

    // show home page
    public function home()
    {
        $clientCount = User::where('role', 'client')->count();
        $userCount = User::where('role', '!=', 'client')->count();
        $billsCount = Bill::count();
        $myBills = Bill::where('client_id', auth()->id())->count();
        $totalConsumption = Bill::where('client_id', auth()->id())->sum('consumption');
        $totalBillAmount = Bill::where('client_id', auth()->id())->sum('bill_amount');

        return view('home', compact(['clientCount', 'userCount', 'billsCount', 'myBills', 'totalConsumption', 'totalBillAmount']));
    }

    // show all users
    public function users()
    {
        $users = User::where('role', '!=', 'client')->paginate(20);

        return view('users.index', compact('users'))->with(['title' => 'Users']);
    }

    // show all clients
    public function clients()
    {
        $users = User::where('role', 'client')->paginate(20);

        return view('users.index', compact('users'))->with(['title' => 'Clients']);
    }

    // delete user
    public function userDelete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    // show update user form
    public function userEdit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // save updated user
    public function userUpdate(Request $request, User $user)
    {
        try {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'meter_number' => $request->input('meter_number'),
                'first_meter_reading' => $request->input('first_meter_reading'),
                'role' => $request->input('role'),
            ]);
        } catch (QueryException $e) {
            abort(500);
        }

        return redirect()->back();
    }

    public function stats()
    {
        return Bill::all();
    }
}
