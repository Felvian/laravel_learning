<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post){
        return view('admin.post.show', compact('post'));
    }
}
