<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $data['id_user'] =  Auth::user()->id;

        $post = Post::create($data);
        $post->tags()->attach($tags);

        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
    }
}
