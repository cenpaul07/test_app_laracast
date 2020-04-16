<?php


namespace App;


class Container
{
    protected $bindings=[];//to store services

    public function bind($key, $value){
        $this->bindings[$key]=$value;
    }

    public function resolve($key){
        if (isset($this->bindings[$key])){
            return call_user_func($this->bindings[$key]);
        }
        else{
            return "service not found!";
        }
    }
}
