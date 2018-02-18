<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class,'photo_post','photos_id','posts_id')
            ->withPivot('use', 'order')
    	    ->withTimestamps();        
    }
}
