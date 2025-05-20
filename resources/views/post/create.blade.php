@extends('layouts.MAIN')

@section('title')
    Create
@endsection
@section('content')
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Enter content" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>
{{--        <div class="form-group mb-3 mt-3">--}}
{{--            <label for="category">Category</label>--}}
{{--            <select class="form-control" id="category" name="category_id">--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option--}}
{{--                        value="{{ $category->id }}"--}}
{{--                        @selected(isset($post) && $post->category_id == $category->id)--}}
{{--                    >--}}
{{--                        {{ $category->title }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="form-group mb-3 mt-3" >
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
        <select class="form-select" multiple aria-label="Multiple select example" id="tags" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>
@endsection
