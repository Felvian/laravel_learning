<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $data =$request->validated();



        $post=$this->service->store($data);




        return redirect()->route('admin.post.index');
    }
}
