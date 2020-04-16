<?php

use App\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('facade','PagesController@facade');

/////to resolve Binding Resolution Error
//App()->bind('App\Example2',function (){ //this code mmoved to app/Providers/AppServiceProvider
//    $collaborator = new \App\Collaborator();
//    $foo='foobar';
//    return new App\Example2($collaborator, $foo);
//});


Route::get('laraval-container-using-controller/','PagesController@home')
    ->name('service_container_using_pages_controller');


Route::get('container/', function(){

    $container = new Container();
    $container->bind('example', function (){
        return new App\Example();
    });
    $example=$container->resolve('example');//to resolve an service in container
//    ddd($example);//ddd = die dump and debug
    $example->go();//calling the Example's go method using service resolved from the container
});

//Laravel's service container is App() itself

//App()->bind('example2', function () {
//    $foo=config('services.foo');
//    return new App\Example2($foo);
//});

Route::get('laraval-container-explicitly-resolving-container/', function (){
    $example = resolve(App\Example::class);// same as $example = App()->make(App\Example2::class);
    ddd($example);
});

//without explicitly specifying
Route::get('laraval-container-without-explicit-resolving/', function (\App\Example $example){
    ddd($example);
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

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

Route::get('/welcome2/', function (Filesystem $file){

    return View::make('welcome2');// same as return view('welcome2');
});

Route::get('/welcome3/', function (Filesystem $file){

    return $file->get(public_path('index.php'));//same as File::get(public_path('index.php'));
//      return Request::input('name');// same as return request('name');
//    return View::make('welcome2');// same as return view('welcome2');

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

Route::post('article/','ArticleController@store')->name('article.store');//saves the form

//Route::get('article/{id}','ArticleController@show');
Route::get('article/{article}','ArticleController@show')->name('article.show');

Route::get('article/','ArticleController@index')->name('article.index');

Route::get('article/{article}/edit','ArticleController@edit');

Route::put('article/{article}/','ArticleController@update')->name('article.update');

Route::get('contact/','ContactController@create')->name('contact.create');
Route::post('contact/','ContactController@store')->name('contact.store');

Route::get('payments/','PaymentsController@create')->name('payment.create')
    ->middleware('auth');
Route::post('payments/','PaymentsController@store')->name('payment.store')
    ->middleware('auth');

Route::get('notifications/','NotificationController@show')->name('notification.show')
    ->middleware('auth');




//Route::get('/logout', function (){
//    auth()->logout();
//    return "You are now logged out!";
//});//for csrf attack experiment

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth'); //alternative method

Route::get('/conversations/','ConversationController@index')
    ->name('conversation.index');
Route::get('/conversations/{conversation}','ConversationController@show')
    ->name('conversation.show');

Route::post('/best-reply/{reply}','ReplyController@store')
    ->name('reply.store');


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



