<?php


namespace App;


use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FacExample::class;//it will look for a key 'App\FacExample'
//        return 'example';
    }

}
