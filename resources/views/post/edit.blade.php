@extends('layouts.main')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group" >
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="form-group mt-5">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" placeholder="Content" value="{{$post->content}}">{{$post->content}}</textarea>
         </div>
        <div class="form-group invisible">
            <label for="img">image</label>
            <input type="text" class="form-control" id="img" name="img" placeholder="image" value="{{$post->img}}">
        </div>
        <div class="form-group mt-5">
            <label for="Category">Category</label>
            <select class="form-control" id="Category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ $category->id === $post->category->id ? 'selected' : ''}}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group mt-5">
            <label for="tags">Tag</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : ''}}
                        @endforeach

                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Update</button>
    </form>
@endsection
