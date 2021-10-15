<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function users()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    public function userDelete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
