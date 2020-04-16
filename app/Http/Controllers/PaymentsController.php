<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{

    public function create()
    {
        return view('payment.create');
    }


    public function store()
    {
        /*TODO: Core Logic : 1. Payment Processing 2. Unlocking Purchase
                Side Effects: 3. Notifying User 4. Generating rewards 5.Sending Shareable Coupons

        Example: Event = ProductPurchased , Listeners = Notifying User,Generating rewards,
        Sending Shareable Coupons */

        //Notification::send(request()->user(),new PaymentReceived()); //use this syntax for multiple users
//        request()->user()->notify(new PaymentReceived('5$')); //better and readable syntax for single users

        ProductPurchased::dispatch('toy');//or event(new ProductPurchased('toy'));


//        return redirect(route('payment.create'))
//            ->with('message','User Notified Successfully.');
    }

}
