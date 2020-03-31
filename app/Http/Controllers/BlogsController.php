<?php


namespace App\Http\Controllers;


class BlogsController
{
    public function show($blog_name_var){

        $blog_names_array =[
            'first-blog'=>"This is my first blog",
            'second-blog'=>"This is my second blog"
        ];

        if(! array_key_exists($blog_name_var,$blog_names_array)){
            abort(404, "This Page Does Not Exist!");
        }

        return view('blog', [
            'blog_name_for_temp' => $blog_names_array[$blog_name_var]
        ]);
    }
}
