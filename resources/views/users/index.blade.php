@extends('layouts.master')

@section('title')
    <title>All Users</title>
@stop

@section('content')
    
    <h1 class="text-center">All Users</h1>
    <section>
        @if(count($users) !== 0)
            @foreach($users as $user)
                <a href="{{ action('UsersController@show', [$user->id]) }}">
                    <article class="well">
                        <h3>{{ ucwords($user->name) }}</h3>
                        <h3>Email: {{ $user->email }}</h3>
                        <h4>Joined {{ $user->created_at->diffForHumans() }} 
                    </article>
                </a>
            @endforeach
        @else
            <h3 class="text-center">No Results</h3>
        @endif
    </section>
    
@stop