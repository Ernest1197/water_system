<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $notifications = Notification::latest()->where([['user_id', auth()->id()],['seen', false]])->paginate(20);
        return view('notifications.index', compact('notifications'));
    }

    public function seen(Notification $notification) {
        if (!$notification) return back();
        $notification->seen = true;
        $notification->save();
        return redirect($notification->link);
    }
}
