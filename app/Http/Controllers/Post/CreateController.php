<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class CreateController extends BaseController
{
    public function __invoke(){
        $categories = Category::all();
        $tags = Tag::all();
        //$user = Auth::user()->id;
        return view('post.create', compact('categories'), compact('tags',));
    }
}
