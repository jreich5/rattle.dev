@extends('layouts.master')

@section('title')
    <title>View Post</title>
@stop

@section('content')
    
    <h1 class="text-center">{{ ucwords($post->title) }}</h1>
    <h4 class="text-center">Posted {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y') }}</h4>
    <h4 class="text-center">By {{ App\User::find($post->created_by)->name }}</h4>
    <p>{{ $post->content }}</p>
    <a href="{{ $post->url }}">{{ $post->url }}</a>

    <a class="btn btn-warning" href="{{ action('PostsController@edit', [$post->id]) }}">Edit Post</a>
    
@stop
