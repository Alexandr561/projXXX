@extends('layouts.MAIN')

@section('title') Edit @endsection
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   placeholder="Enter title" required
                   value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control"
                      placeholder="Enter content" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image"
                   value="{{ old('image', $post->image) }}">


        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
@endsection
