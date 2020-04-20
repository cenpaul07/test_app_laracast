<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table='abilities';
    protected $guarded=[];

    public function uroles(){
        return $this->belongsToMany(Urole::class)->withTimestamps();
    }


}
