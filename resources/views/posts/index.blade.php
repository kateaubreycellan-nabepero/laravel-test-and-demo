@extends('layouts.app')

@section('content')

    <h3>Available Posts</h3>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - {{ $post->content }} | <a href="{{ route('posts.show', $post->id) }}">#{{ $post->id }}</a> | <a href="{{ route('posts.edit', $post->id) }}">Edit</a></li>
        @endforeach
    </ul>

@stop


@section('footer')

@stop