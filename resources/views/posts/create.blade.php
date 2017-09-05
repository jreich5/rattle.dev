@extends('layouts.master')

@section('title')

    <title>Post Create Form</title>

@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">Post Create Form</h2>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ action('PostsController@store') }}">
                        @include('layouts.partials._form')
                        <button class="btn btn-success center-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop