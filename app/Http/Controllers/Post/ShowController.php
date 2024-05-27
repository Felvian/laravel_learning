<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(Post $post){
        $comments=Comment::all();
        $users = User::all();
        return view('post.show', compact('post','comments', 'users'));
    }
}
