<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';


    public function is_best(){
        return $this->id===$this->conversation->best_reply_id;
    }

    public function conversation(){
        return $this->belongsTo(\App\Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
