@extends('layouts.master')

@section('title')

    <title>Send Password Reset</title>

@stop

@section('content')

    <h1 class="text-center">Password Reset</h1>

    <div class="row">
        
        <div class="col-md-4 col-offset-md-4">
            
            <!-- resources/views/auth/password.blade.php -->

            <form method="POST" action="/password/email">
                {!! csrf_field() !!}

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input placeholder="Enter email to reset password" id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    <button type="submit" class="btn btn-warning">
                        Send Password Reset Link
                    </button>
                </div>
            </form>

        </div>

    </div>
@stop