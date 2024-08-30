@extends('layouts.log')

@section('content')
<div class="container form-container">
    <h3>Reset Password</h3>
    <div class="col-md-12 mx-auto">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>
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
                <button type="submit" class="btn btn-dark">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
