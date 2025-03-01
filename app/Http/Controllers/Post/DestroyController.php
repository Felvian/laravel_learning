<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('post.index');
    }
}
