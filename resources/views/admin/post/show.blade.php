@extends('layouts.admin')
@section('content')
    <div>
            <div>{{$post->id}}.{{ $post->title }}</div>
            <div> {{$post->content}}</div>

    </div>
    <div>
        <a class="btn btn-primary mt-3" href="{{route('admin.post.edit', $post->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="delete" class="btn btn-primary mt-3">

        </form>
    </div>
    <div>
        <a class="btn btn-primary mt-3" href="{{route('admin.post.index')}}">Back</a>
    </div>
@endsection
