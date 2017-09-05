@extends('layouts.master')

@section('title')

    <title>Password Reset Form</title>

@stop

@section('content')


    <div class="row">
        
        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-center">Password Reset Form</h2>
                    
                </div>
                <div class="panel-body">
                    <!-- resources/views/auth/reset.blade.php -->
                    <form method="POST" action="/password/reset">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input class="form-control" type="password" name="password_confirmation">
                        </div>

                        <div>
                            <button class="btn btn-success center-block" type="submit">
                                Reset Password
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
            

        </div>

    </div>
@stop