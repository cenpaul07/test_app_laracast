<?php


namespace App\Http\Controllers;
use DB;
use App\Blog;

class DisplayBlogEloquent
{
    public function display($blog_slug){

//        $blog = DB::table('blogs')->where('slug',$blog_slug)->firstOrFail();
        $blog = Blog::where('slug',$blog_slug)->firstOrFail();
//        if(! $blog){
//            abort(404, "Not found!");
//        }

        return view('blog',[
            'blog'=>$blog
        ]);

    }
}
