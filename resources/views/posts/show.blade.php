@extends('layouts.app')

@section('content')

<h2>Title: {{ $post->title }}</h2>
<p>{{ $post->content }}</p>

@stop

@section('footer')

@stop