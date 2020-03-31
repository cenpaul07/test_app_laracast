<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return ('welcome');
});

Route::get('hai', function () {
    return view('hai'); //will gives error since no template named hai
});

Route::get('welcome/array', function () {
    return ["cen"=>23, "paul"=>57];
});

Route::get('test', function () {
    return view('test');
});

// returning arguments passed through url
Route::get('/testnow', function (){
    return view('test',[
        'name_var_for_template' => request('name')
    ]);
});


//displaying wild-card-entries entered through url
Route::get('/wildcard/{blog_name}', function ($blog_name_var){
    return $blog_name_var;
});

//displaying wild-card-entries entered through url in HTML view
Route::get('/wildcard2/{blog_name}', function ($blog_name_var){
    $blog_names_array =[
        'first-blog'=>"This is my first blog",
        'second-blog'=>"This is my second blog"
    ];
    return view('blog', [
        'blog_name_for_temp' => $blog_names_array[$blog_name_var] ?? "404 Not found!"
    ]);
});


//displaying 404 in cases wild-card entries is not matching
Route::get('/wildcard_or_404/{blog_name}', function ($blog_name_var){
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
});

Route::get('/wild_card_using_controller/{blog_name}','BlogsController@show');

Route::get('/generated_controller/{blog_name}','BlogsControllerByGenerator@display');

//Route::get('{blog_name}','DisplayBlog@display');

Route::get('eloquent/{blog_name}','DisplayBlogEloquent@display');

Route::view('contact', 'contactus');

Route::get('/welcome2/', function (){

    return view('welcome2');

});


Route::get('about', function (){

    $articles = App\Article::latest()->take(3)->get(); //latest means order by created_date in descending
//    $articles = App\Article::latest('updated_at')->take(3)->get(); //to sort by updated at
//    $articles = App\Article::all(); //to get all
//    $articles = App\Article::take(3)->get(); //to take the specific no. of objects

    return view('about2', [
        'articles'=>$articles
//        'articles'=>App\Article::latest()->take(3)->get()    //inline code
    ]);

});

Route::get('article/create', 'ArticleController@create');//display the form

Route::post('article/','ArticleController@store');//saves the form

Route::get('article/{id}','ArticleController@show');

Route::get('article/','ArticleController@index');

Route::get('article/{id}/edit','ArticleController@edit');

Route::put('article/{id}/','ArticleController@update');





//REST-full Routing
// GET /articles/       : to get the list of articles
// GET /articles/:id    : to get the specific article with given id
// POST /articles       : to create a new article
// PUT /articles/:id    : to update an existing  article
// DELETE /articles/:id    : to delete an existing  article


//to edit an article
// 1. GET /articles/id/edit   : to GET the article in a form view
//    PUT /articles/:id          : send a PUT request to save the form


// to create an article
// 1. GET /articles/create     :to load the form for creation
//    POST /articles/           : send post request to save the form

//Note other than GET No request type url contains verbs. Try to avoid verbs if its for posting.
// eg: use POST articles/subscriptions instead of POST articles/subscribe

// other cases like hitting the subscribe button
// subscribing means creating a subscription

// 1. POST /articles/subscriptions


















