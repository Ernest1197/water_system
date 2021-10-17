<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user')->only(['userDelete', 'users', 'clients']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $clientCount = User::where('role', 'client')->count();
        $userCount = User::where('role', '!=', 'client')->count();
        $billsCount = Bill::count();

        return view('home', compact(['clientCount', 'userCount', 'billsCount']));
    }

    public function users()
    {
        $users = User::where('role', '!=', 'client')->paginate(20);

        return view('users.index', compact('users'))->with(['title' => 'Users']);
    }

    public function clients()
    {
        $users = User::where('role', 'client')->paginate(20);

        return view('users.index', compact('users'))->with(['title' => 'Clients']);
    }

    public function userDelete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
