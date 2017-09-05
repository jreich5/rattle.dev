@extends('layouts.master')

@section('title')
    <title>View User</title>
@stop

@section('content')
    
    <h1 class="text-center">{{ ucwords($user->name) }}</h1>
    <h4 class="text-center">Joined {{ $user->created_at->setTimezone('America/Chicago')->format('l, F jS Y') }}</h4>
    <h4 class="text-center">Email {{ $user->email }}</h4>
    <a class="btn btn-warning" href="{{ action('UsersController@edit', [$user->id]) }}">Edit User</a>
    
@stop
