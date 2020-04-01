<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//     Default Route Key is id. to change that override getRouteKeyName()
//     getRouteKeyName() returns the table column that will be searched for wild card match automatically.
//    function getRouteKeyName()
//    {
//        return 'slug'; //Article::where('slug', $article)->first();
//    }

    protected $fillable = ['title','excerpt','body']; //to prevent Article::create(request->all());
    //because user can edit the form from front end and can submit additional data through forms
    //otherwise user can update anything through request.
    //protected $guarded = []; //to allow mass assignment , then all columns can be updated through request.

    public function path(){
        return route('article.show',$this);
        //this can be accessed as $article->path in controllers and views
    }

    public function author()/*here laravel assumes the foreign-key field as author_id */
    {
        //user belong to the article
        return $this->belongsTo(User::class, 'user_id'); //returns the user of the article
    }

    public function user()/*here laravel assumes the foreign-key field as user_id */
    {
        //user belong to the article
        return $this->belongsTo(User::class); //returns the user of the article
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
