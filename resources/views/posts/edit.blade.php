@extends('layouts.master')

@section('title')

    <title>Post Edit Form</title>

@stop

@section('content')

    <h1>Post Edit Form</h1>
    
    <form method="POST" action="{{ action('PostsController@update', [$post->id]) }}">
        @include('layouts.partials._form')
        <button class="btn btn-warning pull-left">Update</button>
        {!! method_field('PUT') !!}
    </form>

    <form method="POST" action="{{ action('PostsController@destroy', [$post->id]) }}">
        {!! csrf_field() !!}
        <button class="btn btn-danger pull-right">Delete Post</button>
        {{ method_field('DELETE') }}
    </form>

@stop