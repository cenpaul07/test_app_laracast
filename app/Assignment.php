<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Assignment extends Model
{
    public function complete_now(){
        $this->completed=True;
        $this->save();
    }
}


