<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsControllerByGenerator extends Controller
{
    public function display($blog_name_var){
        return $blog_name_var . "Returning from BlogsControllerByGenerator";
    }
}
