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

        
        <form action="{{ url('/add-student') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
            

            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" rows="3" required>
            </div>

            <div class="form-group">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-control" name="gender" required>
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
                        <option value="{{$department->id }}">{{ $department->d_name}}</option>
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
            

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="part_time">
                <label class="form-check-label" for="part_time">Part-time Student</label>
            </div>
            

            <div class="form-group">
                <label for="joined_date" class="form-label">Joined Date:</label>
                <input type="date" class="form-control" name="joined_date" required>
            </div>
            <div class="form-group">
                <label for="image" class="form-label"> Student Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div> 
        </form>
    </div>
    
    <div class="row py-5">
        <div class="col-12">
            <h3 class="text-center">Registered Students</h3>
            @if($students)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Subjects</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->department->d_name}}</td>
                        <td>
                            @foreach($student->subjects as $subject)
                                {{ $subject->name }}@if(!$loop->last), @endif
                            @endforeach 
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <a href="{{ route('edit-student', $student->id) }}" class="btn btn-dark btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('delete-student', $student->id) }}" method="POST" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                            </form>                       
                        </td>                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    
</div>
</div>
@endsection


 