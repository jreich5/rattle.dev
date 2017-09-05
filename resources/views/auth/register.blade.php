@extends('layouts.master')

@section('title')
    <title>Login</title>
@stop

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-center">Register</h1>
                </div>
                <div class="panel-body">
                    <!-- resources/views/auth/register.blade.php -->
                    <form method="POST" action="/auth/register">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                        </div>

                        <div>
                            <button class="btn btn-success center-block" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop





