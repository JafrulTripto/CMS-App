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

use Illuminate\Support\Facades\Route;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/show',function (){

    $posts=Post::all();

    foreach ($posts as $post){
        return $post->title;
    }
});

Route::get('/insert',function (){
    $posts = new Post;

    $posts->title = "Hi there";
    $posts->description = "How are You";
    $posts->save();

});

Route::get('/insert2',function (){
    Post::create(['title'=>'Hi I am Tripto','description'=>'I am a good boy']);
});

Route::get('/search',function (){
   $posts =  Post::all();

       return $posts;

});
Route::get('/softDelete', function (){
    Post::find(4)->delete();
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
