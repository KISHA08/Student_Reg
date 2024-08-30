@extends('layouts.log')

@section('content')
<div class="container form-container">
    <h3>Forgot Password</h3>
    <div class="col-md-12 mx-auto">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Username:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="current_password" class="form-label">Current Password:</label>
                <input type="password" class="form-control" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-dark">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
