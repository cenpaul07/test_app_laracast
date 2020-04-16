<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function before(User $user)//to check before handling ability
    {
//          return $user->role->id===11; //don't return like this, this will break the normal flow and update() won't be called
        if($user->role->id===1){
            return true;
        }
    }

//    public function after(User $user)//to check after handling an ability
//    {
//       //code goes here
//    }


    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
//        return ($conversation->user->is($user) || $conversation->user->isAdmin );
        return $conversation->user->is($user);
    }

    public function view(User $user, Conversation $conversation){
        return $conversation->user->is($user);
    }


}
