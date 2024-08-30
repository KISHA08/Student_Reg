@extends('layouts.log')
@section('content')
        <div class="container form-container">
            <h3>Register</h3>
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

                <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-dark">Register</button>
                    </div>
                </form>

                <div class="btn-container">
                    <a href="/login" class="btn btn-dark">Login</a>
                </div>
            </div>
        </div>
    
