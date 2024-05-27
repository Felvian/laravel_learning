<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post){
        $data['comment'] = $request->content;
        $data['id_user'] =  Auth::user()->id;
        $data['id_post'] = $post->id;
       // dd($this->authorize('view',$post));
        Comment::create($data);
        return redirect()->route('post.show', $data['id_post']);

    }
}
