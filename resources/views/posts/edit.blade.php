@extends('layouts.app')

@section('content')

<h1>Edit post</h1>
    {!! Form::open(['method' => 'PATCH', 'action' => ['App\Http\Controllers\PostController@update', $post->id]]) !!}
        <div class="form-control">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
            <br>
            {!! Form::label('content', 'Content: ') !!}
            {!! Form::text('content', $post->content, ['class' => 'form-control']) !!}
        </div>
        <div class="form-control">
            {!! Form::submit('Update data', ['class' => 'btn btn-info']) !!}
        </div>
    {!! Form::close() !!}
    <br>
    <br>
    {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
        {!! Form::submit('Delete data. This cannot be undone', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('footer')

@stop