<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post){
        $this->authorize('update',$post);
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('admin.post.show', $post->id);
    }
}
