@extends('layouts.app')

@section('content')

    <form action="/posts" method="post">
        Title: <input type="text" name="title" placeholder="Enter title">
        Content: <input type="text" name="content">
        <input type="submit" name="submit">
    </form>

@stop

@section('footer')

@stop