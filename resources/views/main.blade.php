@extends('layouts.main')
@section('content')
    <div>
        <div> this is main page</div>
    </div>
    <form action="{{ route('comment.store') }}" method="post">
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
@endsection
