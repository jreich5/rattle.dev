@extends('layouts.master')

@section('title')
    <title>All Posts</title>
@stop

@section('content')

    <h1 class="text-center">All Posts</h1>
    <section>
        
        <div class="text-center">{!! $posts->appends(['search' => $search])->render() !!}</div>

        <div class="row">

            <div class="col-md-1 col-md-offset-9 text-right bg-success">
                <h5 class="text-right">Sort By</h5>
            </div>
            <div class="col-md-2">
                <form method="GET" action="{{ action('PostsController@index') }}">
                    <div class="form-group">
                        <select class="form-control" name="sort">
                            <option value="alpha">Alphabetical</option>
                            <option value="votehl">Vote: High to Low</option>
                            <option value="votelh">Vote: Low to High</option>
                            <option value="recent">Most Recent</option>
                        </select>
                    </div>
                </form>
            </div>

        </div>

        @if(count($posts) !== 0)
            @foreach($posts as $post)
                <a href="{{ action('PostsController@show', [$post->id]) }}">
                    <article class="well">
                        <h3>{{ ucwords($post->title) }}</h3>
                        <h4>Submitted {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</h4>
                    </article>
                </a>
            @endforeach
        @else
            <h3 class="text-center">No Results</h3>
        @endif
        
    </section>
    
@stop