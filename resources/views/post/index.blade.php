@extends('layouts.MAIN')

@section('title')Главная? страница@endsection
@section('content')
    <div>
        @foreach($posts as $post)
            <div>{{ $post->title }}</div>
        @endforeach
    </div>
@endsection
