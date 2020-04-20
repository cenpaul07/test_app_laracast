<?php

namespace App\Providers;

use App\Conversation;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
//        'App\Conversation' => 'App\Policies\ConversationPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //for roles and abilities
        Gate::before(function ($user,$ability){
            //view_link is passed as $ability
            return $user->abilities()->contains($ability);//checking view_link is in the abilities() of user
        });

//        Gate::before(function (User $user){
//            if($user->role->id===1){
//                return true;
//            }
//        });

//        Gate::define('update-conversation', function (User $user, Conversation $conversation){
//            //put '?User' instead of 'User', so that even guests are authorized
//                return $conversation->user->is($user);
//        });

        //
    }
}
