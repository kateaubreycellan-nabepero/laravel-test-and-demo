@extends('layouts.app')

@section('content')

    <h1>Contact Page</h1>

    @if (count($people))
        <h2>People count: {{ count($people) }}</h2>
        <ul>
        @foreach($people as $person)
            <li>{{ $person }}</li>
        @endforeach
        </ul>
    @endif

@stop
@section('footer')

    <!-- <script>alert('Hello Visitor!')</script> -->

@stop