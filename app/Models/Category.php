<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function languages()
    {
        return $this->belongsToMany(Language::class,'category_language','categories_id','languages_id')
            ->withPivot('label', 'slug','description')
    	    ->withTimestamps();        
    }    
    
    public function language($iso6391)
    {
        return $this->belongsToMany(Language::class,'category_language','categories_id','languages_id')
            ->withPivot('label', 'slug','description')
    	    ->withTimestamps()
            ->where('iso6391',$iso6391);        
    }
}
