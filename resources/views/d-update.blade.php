@extends('layouts.app')
@section('content')
<div class="row  py-5">
    <div class="col-6">
        <h2>Department Details</h2>

        
        <form action="{{ route('update-department', $departments->id) }}" method="post" enctype="multipart/form-data">
           
            @csrf
            @method("PATCH")

            <div class="form-group">
                <label for="department_HOD" class="form-label">HOD Name:</label>
                <input type="text" class="form-control" name="department_HOD" value="{{$departments->department_HOD}}" required>
            </div>

            
            <div class="form-group">
                <label for="d_name" class="form-label">Department:</label>
                <select class="form-control" name="d_name" value="{{$departments->d_name}}" required>
                    <option value="IT">HNDIT</option> 
                    <option value="Eng">HNDE</option> 
                    <option value="Acc">HNDA</option>
                    <option value="QS">HNDQS</option>  
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>
</div>
@endsection

