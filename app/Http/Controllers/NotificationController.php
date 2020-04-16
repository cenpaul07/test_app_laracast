<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function show(){

//        $notifications = auth()->user()->unreadnotifications;
//        $notifications->markAsRead();//easy and efficient method than below

        /*above 2 lines of code can implemented together using tap like given below*/
        $notifications = tap(auth()->user()->unreadnotifications)->markAsRead();

        //        foreach ($notifications as $notification){
        //            $notification->markAsRead();
        //        }
        return view('notification.show',compact('notifications'));
    }
}
