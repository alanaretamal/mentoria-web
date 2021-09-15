<?php

use App\Models\Post;
use App\Models\Category;
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
   \Illuminate\Support\Facades\DB::listen(function($query){
             logger($query->sql, $query->bindings);
   });
   $posts = Post::all();
   return view('posts', [
     'posts' => $posts
    ]);
});

Route::get('post/{post}',function(Post $post){
    return view('post',[
      'post' => $post,
    ]);
});
//Route::get('/post/{post:slug}', function( Post $post){
Route::get('/category/{category:slug}', function(Category $category){
    view ('posts', [
        'posts'=> $category->posts,
    ]); 
});
     

