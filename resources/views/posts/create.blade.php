@extends('layouts.app')

@section('content')

<h1>Create a Post</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostController@store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            <br>
            {!! Form::label('content', 'Content: ') !!}
            {!! Form::text('content', null, ['class' => 'form-control']) !!}
            <br>
            {!! Form::file('file', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <br>
            {!! Form::submit('Create post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::Close() !!}

    @if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif

@stop

@section('footer')

@stop