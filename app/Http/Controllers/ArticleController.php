<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{
    //7 Rest-full actions
    public function show(Article $article) //Article::where('id', $article)->first();
    {
        //to show a single resources
        //$current_article = Article::findOrFail($id);
        //$current_article = Article::find($id);
        return view('article.show',[
            'current_article'=>$article
        ]);
    }

    public function index(){
        //to show a the list of resources

        //$article_list = Article::paginate(2); //to paginate 2 items on a single page
        // can be navigated by url?page=<pageNum>

        if(request('tag')){
            $tag = Tag::where('name',request('tag'))->firstOrFail();
            $article_list = $tag->articles;
        }
        else{
            $article_list = Article::latest()->get();
        }


        return view('article.index', [
            'article_list' => $article_list
        ]);
    }

    public function create(){
        //to create a new resource
        $tags = Tag::all();
        return view('article.create',
            compact('tags')
        );
    }

    public function store(){
        //to persist or save the newly created resource
//        $article=Article::create($this->validateArticle());
        $this->validateArticle();
        $article = new Article(request(['title','body','excerpt']));
        $article->user_id=4; //$article->auth()->id;
        $article->save();

        if (request('tags')) //or request()->has('tags')
        {
            $article->tags()->attach(request('tags')); //request()->tags or request['tags'] contains array of tag ids.
        }

        //App\Tag::findMany([1,7]); to find many

//        Article::create($ValidatedRequest);
        //same as
//        Article::create([
////            'title' => ['required','min:3','max:200'],
//            'title' => ['required'], //['required']this is also correct
//            'excerpt' => 'required',
//            'body' => 'required'
//        ]);


//      Alternative code
//        $article = new Article();
//        $article->title=request('title');
//        $article->excerpt=request('excerpt');
//        $article->body=request('body');
//        $article->save();


//        return redirect('/article'); //same as below
        return redirect(route('article.index'));

        //dump(request()->all()); // to dump request data
        //request() helper function has the request details  its accessible from controller.

    }

    public function  edit(Article $article){
        //to edit an existing resource
        //$article=Article::find($id);
        return view('article.edit',compact('article'));
        //compact('article') is shorthand for [
        //            'article_list' => $article_list
        //        ]
    }

    public function update(Article $article){
        //to persist or save an edited resource
//        $article=Article::findOrFail($id);
        $article->update($this->validateArticle());
//        request()->validate([
////            'title' => ['required','min:3','max:200'],
//            'title' => ['required'], //['required'] this is also correct
//            'excerpt' => 'required',
//            'body' => 'required'
//        ]);
//        $article=Article::find($id);
//        $article->title=request('title');
//        $article->excerpt=request('excerpt');
//        $article->body=request('body');
//        $article->save();
//        return redirect('/article/' . $id);
//        return redirect(route('article.show',$id));
          return redirect($article->path());

    }

    public function destroy(){
        //to delete a resource
    }

    /**
     * @return array
     */
    protected function validateArticle(): array
    {
        return request()->validate([
//            'title' => ['required','min:3','max:200'],
            'title' => ['required'], //['required']this is also correct
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id', //checking whether the 'tag ids (tags)' passed exist in
            // table tags under column id

        ]);
    }

}
