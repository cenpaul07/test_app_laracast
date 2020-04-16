<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ConversationController extends Controller
{
    public function index(){
        $conversations=Conversation::all();
        return view('conversation.index', compact('conversations'));
    }

    public function show(Conversation $conversation){
//        dd($conversation->user);
        $this->authorize('view', $conversation);
        return view('conversation.show', compact('conversation'));
    }
}
