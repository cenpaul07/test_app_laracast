<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function set_best_reply(Reply $reply){
        $this->best_reply_id=$reply->id;
        $this->save();
    }

    public function get_best_reply(){
        return $this->best_reply_id;
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
