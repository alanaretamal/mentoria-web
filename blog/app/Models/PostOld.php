<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public string $title;
    public string $resumen;
    public string $date;
    public string $slug;
    public string $body;

    public function __construct( $title, $resumen, $date, $slug, $body ){
        $this->title = $title;
        $this->resumen = $resumen;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body; 
    }

    public static function createFromDocument($document){
        return new self(
            $document->title,
            $document->resumen,
            $document->date,
            $document->slug,
            $document->body()
        );
    }

    public static function all(){
     
      return collect(File::files(resource_path("posts/")))   
        ->map(fn ($file) => YamlFrontMatter::parseFile($file))
        ->map(fn ($document) => Post::createFromDocument($document));
    }
    public static function find($slug)
    {
        $post=static::all()->firstWhere('slug',$slug);
        return  $post;

        return cache()->remember("post.{$slug}",now()->addDys(1),fn()=>static::all()->firstWhere('slug',$slug));

    }
}