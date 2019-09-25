<?php

namespace App\Http\Controllers;

use App\Notifications\NewReplyAdded;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications()
    {
    	auth()->user()->notifications->markAsRead();

    	return view('users.notifications')->with('notifications',auth()->user()->notifications);

    }
}
