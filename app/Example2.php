<?php


namespace App;


class Example2
{
    protected $collaborator;
    protected $foo;
    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator=$collaborator;
        $this->foo=$foo;
    }
}
//    protected $foo;
//
//    public function __construct($foo)
//    {
//        $this->foo=$foo;
//    }



