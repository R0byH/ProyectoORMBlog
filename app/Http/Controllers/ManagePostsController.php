<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ManagePostsController extends Controller
{
    //
     public function index()
    {


        $data = [
            "posts" => Post::get()
        ];


        return view("posts.index", $data);
    }
    public function show(Post $post)
    {
    return view("posts.post")->withPost($post);
    }
    
}
