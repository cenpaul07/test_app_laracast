<?php


namespace App\Http\Controllers;

use DB;

class DisplayBlog
{
    public function display($blog_slug){
        $blog = \DB::table('Blogs')->where('slug',$blog_slug)->first();
        return view('blog',[
            'blog'=>$blog
        ]);
    }
}

