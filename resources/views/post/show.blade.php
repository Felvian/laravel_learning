@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}.{{ $post->title }}</div>
        <div> {{$post->content}}</div>

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
@endsection
