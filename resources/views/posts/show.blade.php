@extends('layouts.app')

@section('content')

<h2>Title: {{ $post->title }}</h2>
<p>{{ $post->content }}</p>
<br>
<img style="height: 250px;" src="{{ $post->path }}" />

@stop

@section('footer')

@stop