<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth; 


class ManageCommentsController extends Controller
{
    //
//    public function create(Request $request,Post $post)
//    {
//        $input = $request->all();
//        dd($input);
//        return view("comments.create")->withId($id);
//    }
    public function store(Request $request)
    {
        $input = $request->all();
        $autor=Auth::user();
        $id_post=$input['id_post'];
        $post=Post::get()->find($id_post);
        $comment=Comment::create([
            "comment"       => $input["comment"],
            "autor_id"      =>$autor->id,
            "posts_id"      =>$id_post,
        ]);
        return view("posts.post")->withPost($post);
    }
    public function edit(Comment $comment)
    {
        
        return view("comments.edit")->withComment($comment);
    }
    
    public function update(Request $request, Comment $comment)
    {
        $input = $request->all();
        $comment->comment = $input["comment"];
        if ($comment->save()) {
            # code...
             return view("posts.post")->withPost($comment->post);
        }
        abort(500);
    }
    
    public function destroy(Comment $comment)
    {
        $post=$comment->post;
        $comment->delete();
        return view("posts.post")->withPost($comment->post);
    }
    
    
}
