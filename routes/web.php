<?php

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


Route::resource('publishes',"ManagePublishesController",[
    'only'         => ['index',"show","edit","store","update","create"],
]);

Route::resource('posts',"ManagePostsController",[
    'only'         => ['index',"show","edit","store","update","create"],
]);

Route::resource('comments',"ManageCommentsController",[
    'only'         => ["edit","store","update","destroy"],
]);

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    $posts=  App\Models\Post::get();
    
    return view('home')->withTitle("Entradas")->withPosts($posts);
})->name('home');



Route::get('/comments/create/{id_post}',function($id_post){
 $post=  App\Post::find($id_post);
    
 return view("comments.create")->withId($id_post);
})->name('comments.create');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout',function(){
 Auth::logout();
 return redirect('/');
})->name('logout');

Route::get('user/{user_id}',function($user_id){
    $user=App\User::find($user_id);
 return view('auth.profile')->withUser($user);
 
})->name('user');

Route::get('user/{user_id}/post',function($user_id){
    $posts=App\Post::where("autor_id", "=", $user_id)->get();
    
    
 return  view('home')->withTitle("Entradas ".Auth::user()->name)->withPosts($posts);
 
})->name('user-post');

Route::get('category/{slug}',function($slug){
    $language=  App\Language::where("iso6391",App::getLocale())->first();
    $posts=$language->posts()->where("slug",$slug)->get();
    
 return  view('home')->withTitle("Entradas ".$slug)->withPosts($posts);
 
})->name('category-post');

Route::get('publish/{id}',function($id){
    $posts=App\Post::where("publishes_id", $id)->get();
    $publish=App\Publish::find($id);
 return  view('home')->withTitle("Entradas ".$publish->label)->withPosts($posts);
 
})->name('publish-post');

Route::get('/cambiaridioma/{locale}',function($locale){
if (in_array($locale, \Config::get('app.locales'))) {
    Session::put('locale', $locale);
  }
  return redirect()->back();
})->name('cambiaridioma');