<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment','autor_id','posts_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class,'autor_id');        
    }

    public function post()
    {
        return $this->belongsTo(Post::class,'posts_id');        
    }
}
