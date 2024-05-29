<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Notifications\NewNotification;
use App\Models\User;

class NotificationController extends Controller
{
    //
    public function index()
    {
        // dd('hello');
        // Retrieve the authenticated user's notifications
        $notifications = Auth::user()->notifications()->get();

        // Pass the notifications to the view
        // return ('hello notification');
        return view('notifications.index', compact('notifications'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNotifications()
    {
        $notifications = auth()->user()->notifications;
        dd($notifications);
        return view('notifications', ['notifications' => $notifications]);
    }


    public function notifyUser(Request $request)
    {
        $user = User::find(1); // Replace with your user retrieval logic
        $data = ['message' => 'You have a new notification!'];
        
        $user->notify(new NewNotification($data));

        return back()->with('success', 'Notification sent!');
    }
}
