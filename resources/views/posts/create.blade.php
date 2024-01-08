@extends('layouts.app')

@section('content')

<h1>Create a Post</h1>
    <form action="/posts" method="post">
        {{ csrf_field() }}
        Title: <input type="text" name="title" placeholder="Enter title"><br>
        Content: <input type="text" name="content"><br>
        <input type="submit" name="submit">
    </form>

@stop

@section('footer')

@stop