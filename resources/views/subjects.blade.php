@extends('layouts.app')
@section('content')

<div class="row  py-5">
    <div class="col-6">
                  <h2>Subject Details</h2>

        
        <form action="{{ url('subjects') }}" method="post" enctype="multipart/form-data">
            @csrf          
            <div class="form-group">
                <label for="name" class="form-label">Subject Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
            
        </form>
                </div>
            
    
<div class="row py-5">
    <div class="col-6">
        <h3>Subject Details</h3>
        @if($subjects)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject Name</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                  <tr>
                 <td>{{ $loop->iteration }}</td>
                <td>{{ $subject->name }}</td>
             <td>
        <form action="{{ url('subjects/'.$subject->id.'/delete') }}" method="POST" style="display:inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Subject" onclick="return confirm('Confirm delete?')">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
            </button>
        </form>
    </td>
       </tr>
           @endforeach

                </tbody>
            </table>
        @else
            <p>No departments found.</p>
        @endif
    </div>
</div>


<div class="row py-5">
    <div class="col-6">
        <h3>Student Details</h3>
        @if($students)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Subjects</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            @foreach($student->subjects as $subject)
                                {{ $subject->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


</div>
@endsection


