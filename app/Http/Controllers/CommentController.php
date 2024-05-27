<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request){
        $data =$request->validated();
        $data['id_user'] =  Auth::user()->id;
        //dd($post);
        Comment::create($data);
        return redirect()->route('post.show');

    }
}
