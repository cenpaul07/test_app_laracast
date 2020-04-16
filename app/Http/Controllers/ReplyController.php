<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Reply $reply){

//        if(Gate::denies('update_conversation', $reply->conversation)){
            //handle this way
            // or we can use Gate::allows in the same way
//        }

//        $this->authorize('update-conversation', $reply->conversation);//when used with auth-service-provider
        $this->authorize('update', $reply->conversation);
        $reply->conversation->set_best_reply($reply);
        return back();//to redirect back
    }
}
