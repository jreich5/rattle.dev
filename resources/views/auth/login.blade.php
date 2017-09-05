@extends('layouts.master')

@section('title')
    <title>Login</title>
@stop

@section('content')    
    <!-- resources/views/auth/login.blade.php -->
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/auth/login">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" id="password">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input class="" type="checkbox" name="remember"> <strong>Remember Me</strong>
                            </label>
                        </div>

                        <p><a href="{{ url("password/email") }}">Forgot My Password</a></p>

                        <div class="">
                            <button class="btn btn-success center-block" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@stop