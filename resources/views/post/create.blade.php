@extends('layouts.MAIN')

@section('title') Create @endsection
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="title" >Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content" >Content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Enter content" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image" >Image</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>
@endsection
