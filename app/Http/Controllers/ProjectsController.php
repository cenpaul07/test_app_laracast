<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        return view('vue.projects.create',[
            'projects'=>Project::all()
        ]);

    }


    public function store()
    {
        $this->validate(request(),[
            'project_name'=>'required',
            'project_desc'=>'required'
        ]);
//        $validated_data=request()->validate([
//            'project_name'=>'required',
//            'project_desc'=>'required'
//        ]);

        Project::forceCreate([
            'project_name'=> request('project_name'),
            'project_desc'=> request('project_desc'),
        ]);

        return ['message'=>'project created'];
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
