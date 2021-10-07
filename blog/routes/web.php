<?php

use App\Models\Post;
use App\Models\User;
//use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
//use Spatie\YamlFrontMatter\YamlFrontMatter;
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
   //$posts = cache()->rememberForever('posts.all',fn () =>Post::all());
    \Illuminate\Support\Facades\DB::listen(function( $query){
        logger($query->sql , $query->bindings);
    });

    
    return view('posts', [
      'posts' => Post::latest('published_at')
      ->with(['category', 'author'])
      ->get() ,
       'categories' => Category::all()
      //'post' => collect([])
     ]);



/*    $posts = Post::all();
   return view('posts', [
     'posts' => $posts
    ]); */
});


//Route::get('/post/{post:slug}', function( Post $post){
Route::get('/post/{post}', function( Post $post){
    return view ('post', [
        'post'=> $post
    ]);
});

Route::get('/category/{category:slug}', function( Category $category){
    
    return view ('posts', [
        'posts'=> $category->posts->load(['category' , 'author']),
    ]);
});

Route::get('/author/{author}', function( User $author){
    
    return view ('posts', [
        //eager loading  , por defecto es lazy loading
        'posts'=> $author->posts->load(['category' , 'author']),
    ]);
});


     


//Route::get('/', fn () => view ('welcome'));
//Route::get('/', fn () => 'Hola Segic');
//Route::get('/', fn () => ['id' => 7, 'url' => 'http://www.segic.cl']);