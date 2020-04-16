<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
//    public function home(\App\Example2 $example2){
//        ddd($example2);
//    }

    public function home()
    {
        try
        {
            ddd(resolve('App\Example2'), resolve('App\Example2'));
        }
        catch (\Exception $e)
        {
            //catch exception here
        }
    }

    public function facade(){
        Cache::remember('foo',60, fn()=>'foobar');
        return Cache::get('foo');
    }


}
