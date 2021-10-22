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
})->name('home');

Route::get('/post/{post}', function( Post $post){
    return view ('post', [
        'post'=> $post
    ]);
});

Route::get('/category/{category:slug}', function( Category $category){
    
    return view ('posts', [
        'posts'=> $category->posts->load(['category' , 'author']),
        'categories' => Category::all(),
        'currentCategory' => $category,
    ]);
});

Route::get('/author/{author}', function( User $author){
    
    return view ('posts', [
        'posts'=> $author->posts->load(['category' , 'author']),
    ]);
});


     

