@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}.{{ $post->title }}</div>
        <div> <pre>{!! $post->content !!}</pre></div>

    </div>
    @can('view', $post)
        <div>
            <a class="btn btn-primary mt-3" href="{{route('post.edit', $post->id)}}">Edit</a>
        </div>
    @endcan
    @can('delete', $post)
        <div>
            <form action="{{route('post.delete', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="delete" class="btn btn-primary mt-3">

            </form>
        </div>
    @endcan
    <div>
        <a class="btn btn-primary mt-3" href="{{route('post.index')}}">Back</a>
    </div>

    <div class="mt-5">
        <h3>Комментарии</h3>
    </div>
    @auth()
    <form action="{{route('comment.store', $post->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Your comment</label>
            <textarea value="{{ old('content') }}" class="form-control" id="content" name="content" placeholder="Content"></textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
    @endauth
    @foreach($comments as $comment)
        @if($comment->id_post===$post->id)
            <div class="card mt-2">
                <div class="card-body mb-0 pb-0">
                    {{$comment->comment}}
                </div>
                <div class="card-body mb-1 pt-0 pb-0">
                    <p>Author: {{ $comment->user->name }} </p>
                </div>
            </div>
        @endif
    @endforeach
@endsection
