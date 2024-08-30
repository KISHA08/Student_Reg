@extends('layouts.app')
@section('content')


<div class="row  py-5">
    <div class="col-6">
        <h3>Students Phone</h3>
        @if($students)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Name</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                   
                    <td>{{$loop->iteration}}</td>                  
                    <td>{{$student->phone}}</td>
                    <td>{{$student->name}}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection


    