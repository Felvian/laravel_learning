@extends('layouts.main')
@section('content')
    <div>
        @auth
        <div>
            <a class="btn btn-primary mb-3" href="{{route('post.create')}}">Create</a>
        </div>
        @endauth
        @foreach($posts as $post)
            <div><a href="{{route('post.show',$post->id)}}">{{$post->id}}.{{ $post->title }}</a></div>
        @endforeach

        <div class="mt-3">
            {{ $posts->withQueryString()-> links() }}
        </div>
    </div>
@endsection
