<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {    
        return Post::latest('published_at')
            ->filter(request(['search','category']))
            ->paginate(5);

            /* 'categories' => Category::all(),
            'currentCategory' => 
              request('category')!==null ? Category::where('slug',request('category'))->first():null, 
       ]); */
    }
    public function show(Post $post)
    {     
            return view('post', [
                'post' => $post,
            ]);
        
    }
}
