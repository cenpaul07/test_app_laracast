<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesAbilitiesController extends Controller
{
    public function index(){
        return view('role.index');
    }

    public function show(){
        return "secret File";
    }
}
