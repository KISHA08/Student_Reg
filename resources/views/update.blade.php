@extends('layouts.app')
@section('content')
<div class="row  py-5">
    <div class="col-6">
        <h2>Registration</h2>

        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif()


<form action="{{ route('update-student', $students->id) }}" method="post" enctype="multipart/form-data">
@csrf <!-- CSRF token -->
@method("PATCH")

<div class="form-group">
<label for="name" class="form-label">Name:</label>
<input type="text" class="form-control" name="name" value="{{$students->name}}"required>
</div>

<div class="form-group">
<label for="email" class="form-label">Email:</label>
<input type="email" class="form-control" name="email" value="{{$students->email}}" required>
</div>

<div class="form-group">
<label for="phone" class="form-label">Phone:</label>
<input type="tel" class="form-control" name="phone" value="{{$students->phone}}" required>
</div>

<div class="form-group">
<label for="address" class="form-label">Address:</label>
<input type="text" class="form-control" name="address" rows="3" value="{{$students->address}}" required>
</div>

<div class="form-group">
<label for="gender" class="form-label">Gender:</label>
<select class="form-control" name="gender" value="{{$students->gender}}" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select>
</div>

<div class="form-group">
<label for="department_id" class="form-label">Department:</label>
{{-- <input type="text" class="form-control" name="department" required> --}}
<select class="form-control" name="department_id" required>
    @foreach($departments as $department)
        <option value="{{$department->id }}">{{ $department->d_name }}</option>
    @endforeach
</select>
</div>

<div class="form-group">
    <label for="subject" class="form-label">Subject:</label>
    <select class="form-control" name="subject[]" multiple required>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3 form-check">
<input type="checkbox" class="form-check-input" name="part_time" value="{{$students->part_time}}">
<label class="form-check-label" for="part_time">Part-time Student</label>
</div>


<div class="form-group">
<label for="joined_date" class="form-label">Joined Date:</label>
<input type="date" class="form-control" name="joined_date" value="{{$students->joined_date}}" required>
</div>
<div class="form-group">
<label for="image" class="form-label"> Student Image</label>
<input type="file" name="image" id="image" class="form-control" value="{{$students->image}}">
</div>

<button type="submit" class="btn btn-dark">Update</button>
</form>
</div>
</div>
@endsection



