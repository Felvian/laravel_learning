<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke(){
        $categories = Category::all();
        $tags = Tag::all();
        //$posts = Post::all();
        return view('admin.post.create', compact('categories'), compact('tags'));
    }
}
