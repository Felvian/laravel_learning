@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="Title">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-5">
            <label for="content">Content</label>
            <textarea value="{{ old('content') }}" class="form-control" id="content" name="content" placeholder="Content"></textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group invisible">
            <label for="img">image</label>
            <input value="what" type="text" class="form-control" id="img" name="img" placeholder="image">
            @error('img')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" id="Category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ old('category_id')==$category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group mt-5">
            <label for="tags">Tag</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Create</button>
    </form>
@endsection
