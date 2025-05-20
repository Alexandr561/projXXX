@extends('layouts.MAIN')

@section('title')
    Edit
@endsection
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
        </div>
        {{--                        @if((old('category_id') ?? ($post->category_id ?? '')) == $category->id) selected @endif--}}

        <div class="form-group mb-3 mt-3">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category->id ? ' selected ' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="tags">Теги</label>
            <select class="form-select" multiple aria-label="Multiple select example" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        {{ $post->tags->contains($tag->id) ? 'selected' : '' }}
                        value="{{ $tag->id }}">{{ $tag->title }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
@endsection
