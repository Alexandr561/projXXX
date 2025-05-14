@extends('layouts.MAIN')

@section('title')Главная? страница@endsection
@section('content')



    <div>

            @foreach($posts as $post)
            <div>
                    <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
            </div>
            @endforeach

    </div>

    <div class="mt-4">
        <a href="{{ route('post.create') }}" class="btn btn-secondary">
            create
        </a>
    </div>
@endsection
