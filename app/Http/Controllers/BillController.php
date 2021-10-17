<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bills = Bill::where('client_id', auth()->id())->paginate(20);

        return view('bills.index', compact('bills'));
    }

    public function bill(User $user)
    {
        return view('bills.user', compact('user'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
