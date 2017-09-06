@extends('layouts.master')

@section('title')
    <title>All Posts</title>
@stop

@section('style')

    <style>
                
        select {
            margin-left: 10px;
        }
        .voter {
            font-size: 20px;
        }


    </style>

@stop

@section('content')

    <h1 class="text-center">Posts</h1>
    <section>
        
        <div class="text-center">{!! $posts->appends(['search' => $search, 'per' => $per, 'sort' => $sort])->render() !!}</div>

        <form class="form-inline" id="sortForm" method="GET" action="{{ action('PostsController@index') }}">
            <div class="form-group">
                <label for="per" class=""><h5>Results Per Page</h5></label>
                <select id="per" class="form-control" name="per">
                    <option value="five" {{ $per == "five" ? "selected" : "" }}>5</option>
                    <option value="ten" {{ $per == "ten" ? "selected" : "" }}>10</option>
                    <option value="twenty" {{ $per == "twenty" ? "selected" : "" }}>20</option>
                    <option value="thirty" {{ $per == "thirty" ? "selected" : "" }}>30</option>
                </select>
            </div>
            <div class="form-group pull-right">
                <label for="sort"><h5>Sort By</h5></label>
                <select id="sort" class="form-control" name="sort">
                    <option value="alpha" {{ $sort == "alpha" ? "selected" : "" }}>Alphabetical</option>
                    <option value="votehl" {{ $sort == "votehl" ? "selected" : "" }}>Vote: High to Low</option>
                    <option value="votelh" {{ $sort == "votelh" ? "selected" : "" }}>Vote: Low to High</option>
                    <option value="recent" {{ $sort == "recent" ? "selected" : "" }}>Most Recent</option>
                </select>
            </div>
            <input type="hidden" name="search" value="{{ Input::get('search') }}">
        </form>

        @if(count($posts) !== 0)
            @foreach($posts as $post)
                <article class="well">
                    <div class="row">
                        <div class="col-md-1 voter">
                            <a href="">
                                <div class="voteArrow text-center">
                                    <span class="glyphicon glyphicon-menu-up"></span>
                                </div>
                            </a>
                            <p class="text-center">0</p>
                            <a href="">
                                <div class="voteArrow text-center">
                                    <span class="glyphicon glyphicon-menu-down"></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ action('PostsController@show', [$post->id]) }}">
                                <h3>{{ ucwords($post->title) }}</h3>
                                <h4>Submitted {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</h4>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <h3 class="text-center">No Results</h3>
        @endif
        
    </section>
    
@stop


@section('scripts')
        
    <script>
        "use strict";

        var sort = document.getElementById('sort');
        var per = document.getElementById('per');
        var sortForm = document.getElementById('sortForm');

        sort.addEventListener("change", function(){
            sortForm.submit();  
        });
        
        per.addEventListener("change", function(){
            sortForm.submit();  
        });
        
    </script>    

@stop

