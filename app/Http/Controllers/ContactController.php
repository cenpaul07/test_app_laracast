<?php


namespace App\Http\Controllers;


use App\Mail\ContactMe;
use App\Mail\ContactMeMarkDown;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    public function create(){
        return view('contact.create');
    }

    public function  store(){
        request()->validate(['email'=>'required|email']);

//        Mail::raw('Subscription successful', function ($message){
//            $message->to(request('email'))
//                ->subject('Subscription message')
//                ->from('cen@gmail.com');//or can be provide globally in env or config/mail
//        });

//        Mail::to(request('email'))
//            ->send(new ContactMe("HelloContent"));
//
        Mail::to(request('email'))
            ->send(new ContactMeMarkDown());

        return redirect(route('contact.create'))
            ->with('mail_message','Notification sent successfully');//flash message is data stored in session for one request.

    }
}
