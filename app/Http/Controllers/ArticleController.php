<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //7 Rest-full actions
    public function show($id){
        //to show the list of resources
        $current_article = Article::findOrFail($id);
//        $current_article = Article::find($id);

        return view('article.show',[
            'current_article'=>$current_article
        ]);
    }

    public function index(){
        //to show a single resource

        //$article_list = Article::paginate(2); //to paginate 2 items on a single page
        // can be navigated by url?page=<pageNum>

        $article_list = Article::latest()->get();


        return view('article.index', [
            'article_list' => $article_list
        ]);
    }

    public function create(){
        //to create a new resource
        return view('article.create');
    }

    public function store(){
        //to persist or save the newly created resource
        // todo: clean-up making code short and concise
        request()->validate([
//            'title' => ['required','min:3','max:200'],
            'title' => ['required'], //['required'] this is also correct
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $article = new Article();
        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->body=request('body');
        $article->save();
        return redirect('/article');
       //dump(request()->all()); // to dump request data
       //request() helper function has the request details  its accessible from controller.

    }

    public function  edit($id){
        //to edit an existing resource

        $article=Article::find($id);
        return view('article.edit',compact('article'));
        //compact('article') is shorthand for [
        //            'article_list' => $article_list
        //        ]
    }

    public function update($id){
        //to persist or save an edited resource
        request()->validate([
//            'title' => ['required','min:3','max:200'],
            'title' => ['required'], //['required'] this is also correct
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $article=Article::find($id);
        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->body=request('body');
        $article->save();
        return redirect('/article/' . $id);

    }

    public function destroy(){
        //to delete an resource
    }

}
