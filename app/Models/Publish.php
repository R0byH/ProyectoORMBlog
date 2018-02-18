<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','label', 'is_publish',
    ];

    public function autors()
    {
        return $this->belongsToMany(User::class,'posts','publishes_id','autor_id')
            ->withPivot('published_at', 'detele_at')
    	    ->withTimestamps();        
    }
}
