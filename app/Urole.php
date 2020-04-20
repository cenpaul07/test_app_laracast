<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urole extends Model
{
    protected $table='uroles';
    protected $guarded = [];

    public function abilities(){
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function allowTo($ability){

        if(is_string($ability)){
            $ability = Ability::whereName($ability)->firstorFail();
        }

        $this->abilities()->save($ability);
//        $this->abilities()->sync($ability);//to replace existing abilities(same-primary-key) with  this collection remaining will be dropped
//        $this->abilities()->sync($ability, false);//only same primary-key will be replace remaining will not be dropped
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
