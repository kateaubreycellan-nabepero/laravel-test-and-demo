@extends('layouts.app')

@section('content')

<h1>Edit post</h1>
    <form action="/posts/{{ $post->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        Title: <input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}"><br>
        Content: <input type="text" name="content" value="{{ $post->content }}"><br>
        <input type="submit" name="submit">
    </form>

@stop

@section('footer')

@stop