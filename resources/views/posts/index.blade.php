@extends('layouts.app')

@section('content')

    <h3>Available Posts</h3>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - {{ $post->content }}</li>
        @endforeach
    </ul>

@stop


@section('footer')

@stop