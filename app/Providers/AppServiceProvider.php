<?php

namespace App\Providers;

use App\FacExample;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('App\Example2',function (){ //same as below
//        App()->bind('App\Example2',function (){
//            $collaborator = new \App\Collaborator();
//            $foo='foobar';
//            return new \App\Example2($collaborator, $foo);
//        });

        App()->singleton('App\Example2',function (){//using single ton to get same instance every time
            $collaborator = new \App\Collaborator();
            $foo='foobar';
            return new \App\Example2($collaborator, $foo);
        });

        $this->app->bind(FacExample::class,function (){

            return new FacExample('api_key_here');

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
