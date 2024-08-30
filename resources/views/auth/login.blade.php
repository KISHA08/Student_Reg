
@extends('layouts.log')
@section('content')
    
    <div class="container form-container">
        <h3>Login</h3>
        <div class="col-md-12 mx-auto">
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$errors}}
            </div>
            @endforeach
            <ul>
                {!! implode('',$errors->all('<li>:message</li>'))!!}
            </ul>
            @endif
        <form action="authenticate" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
            </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            </div>
            <div class="btn-container">
                <a href="{{ route('password.request') }}">Forgot Password</a>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
        </form>

        <div class="btn-container">
            <a href="/" class="btn btn-dark">Register</a>
        </div>
    </div>
    </div>
