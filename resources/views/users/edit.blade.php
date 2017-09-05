@extends('layouts.master')

@section('title')

    <title>User Account Edit Form</title>

@stop

@section('content')

    <h1>User Account Edit Form</h1>
    
    <form id="userUpdateForm" method="POST" action="{{ action('UsersController@update', [$user->id]) }}">
        {!! csrf_field() !!}
        <div>
            Name
            <input type="text" name="name" value="{{ isset($user->name) ? $user->name : old('name') }}">
        </div>

        <div id="nameInput">
            Email
            <input type="email" id="name" name="email" value="{{ isset($user->email) ? $user->email : old('email') }}">
        </div>

        <button class="btn btn-warning pull-left">Update</button>
        {!! method_field('PUT') !!}
    </form>

    <form method="POST" action="{{ action('UsersController@destroy', [$user->id]) }}">
        {!! csrf_field() !!}
        <button class="btn btn-danger pull-right">Delete User</button>
        {{ method_field('DELETE') }}
    </form>

@stop

@section('scripts')
    
    <script>

        // (function(){

        //     "use strict";
            
        //     var initalEmailValue = document.getElementById('name').value;
        //     var form = document.getElementById('userUpdateForm');
        //     // function to prevent email input from being submitted to backend if no change is made
        //     function preventEmail(e) {
        //         var newForm = ""; 
        //         var currentEmailValue = document.getElementById('name').value;
        //         var element = document.getElementById("nameInput");
        //         var child = document.getElementById("name");
                
        //         e.preventDefault();

        //         console.log("It worked");

        //         if (currentEmailValue === initalEmailValue) {
        //             element.removeChild(child);
        //             newForm = document.getElementById('userUpdateForm');
        //         }

        //         form.submit();
        //     }

        //     form.addEventListener("submit", preventEmail, false); 

        // })();

    </script>
    
@stop