<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        //articles of a user
        return $this->hasMany(Article::class);//return the articles user has
    }

    public function projects(){
        //projects of a user
        return $this->hasMany(Project::class);//return the projects user has

    }

    public function uroles(){
        return $this->belongsToMany(Urole::class)->withTimestamps();
    }

    public function assign_role($role){

        if(is_string($role)){
            $role = URole::whereName($role)->firstorFail();
        }

//        $this->uroles()->save($role);
        $this->uroles()->sync($role, false);//replace existing same pk datas without removing other
    }

    public function abilities(){
       return $this->uroles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function routeNotificationForNexmo($notification)
    {
//      return $this->phone_number;
        return '919747089045';
    }


}
