<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();

       $user= User::factory()->create();
       $personal =Category::create([
           'name' =>'Personal',
           'slug' => 'personal'
       ]);
       Category::create([
        'name' =>'Work',
        'slug' => 'Work'
    ]);
    Category::create([
        'name' =>'Hobbies',
        'slug' => 'Hobbies'
    ]);
    Post::create([
        'category'=> '',
        'user_id'=>'',
        'slug'=>'my-first-post',
        'title' => 'My First Post',
        'resumen' =>'There are many variations of passages of Lorem Ipsum',
        'body'=>'There are many variations of Lorem Ipsum',
    ]);
    }
}
