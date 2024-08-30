@extends('layouts.app')
@section('content')


<div class="row  py-5">
    <div class="col-6">
                  <h2>Department Details</h2>     
        <form action="{{ url('/add_department') }}" method="post" enctype="multipart/form-data">
           
            @csrf
                {{-- <div class="form-group">
                <label for="d-id" class="form-label">Department ID:</label>
                <input type="text" class="form-control" name="d-id" required>
            </div> --}}

          
            <div class="form-group">
                <label for="department_HOD" class="form-label">HOD Name:</label>
                <input type="text" class="form-control" name="department_HOD" required>
            </div>

            
            <div class="form-group">
                <label for="d_name" class="form-label">Department:</label>
                <select class="form-control" name="d_name" required>
                    <option value="IT">HNDIT</option> 
                    <option value="Eng">HNDE</option> 
                    <option value="Acc">HNDA</option>
                    <option value="QS">HNDQS</option>  
                </select>
            </div>

            <div class="col-6 mt-3">
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
        </form>
        
      </div>
   
    
<div class="row py-5">
    <div class="col-6">
        <h3>Department Details</h3>
        @if($departments)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>HOD Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $department->d_name}}</td>
                        <td>{{ $department->department_HOD}}</td>
                        <td>
                            
                            <a href="{{ route('edit-department', $department->id) }}" class="btn btn-dark btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            
                            <form action="{{ route('delete-department', $department->id) }}" method="POST" style="display:inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Department" onclick="return confirm('Confirm delete?')">
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
</div>
@endsection

