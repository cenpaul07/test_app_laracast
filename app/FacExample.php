<?php


namespace App;


class FacExample
{

    protected $api_key;

    /**
     * FacExample constructor.
     * @param $api_key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }


    function handle(){
        return "All Glory To Jesus! Facade used: ".ExampleFacade::class;
    }
}
