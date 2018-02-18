<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function autors()
    {
        return $this->belongsToMany(User::class,'comments','posts_id','autor_id')
            ->withPivot('comment')
    	    ->withTimestamps();        
    }

    public function author()
    {
        return $this->belongsTo(User::class,'autor_id');
    }
    
    public function comments()
    {
        return $this->HasMany(Comment::class,'posts_id');        
    }
    
    public function publish()
    {
        return $this->belongsTo(Publish::class,'publishes_id');     
    }
    
     public function languages()
    {
        return $this->belongsToMany(Language::class,'language_post','posts_id','languages_id')
            ->withPivot('title')
            ->withPivot('slug')
            ->withPivot('content')    
    	    ->withTimestamps();        
    }

     public function language($iso6391)
    {
        return $this->belongsToMany(Language::class,'language_post','posts_id','languages_id')
            ->withPivot('title')
            ->withPivot('slug')
            ->withPivot('content')    
    	    ->withTimestamps()
            ->where('iso6391',$iso6391);        
    }
    
    public function photos()
    {        
        return $this->belongsToMany(Photo::class,'photo_post','posts_id','photos_id')
            ->withPivot('use')
            ->withPivot('order')    
    	    ->withTimestamps();
    }
}
