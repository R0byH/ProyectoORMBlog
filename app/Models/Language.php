<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class,'language_post','languages_id','posts_id')
            ->withPivot('title', 'slug','content')
    	    ->withTimestamps();        
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_language','languages_id','categories_id')
            ->withPivot('label', 'slug','content')
    	    ->withTimestamps();
    }
}
