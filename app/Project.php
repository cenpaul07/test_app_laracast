<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function user(){
        //user belong to the project
        return $this->belongsTo(User::class); //returns the user corresponding to the specified project
    }

}

//hasOne
//hasMany
//belongsTo

//advanced:
//belongsToMany : when a model belongs to many models
//morphMany : for polymorphic relationships
