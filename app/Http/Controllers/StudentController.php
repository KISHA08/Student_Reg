<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function viewForm()
    {
        $students = Student::with('subjects')->get();
        $departments = Department::all();
        $subjects = Subject::all();
        return view('student-reg', ['students' => $students, 'departments' =>$departments, 'subjects' => $subjects]);
    }

    public function addStudent(Request $request)
{
    $data = $request->except('subject'); 
    //$data = $request->all(); 
    $data['part_time'] = $request->has('part_time');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('student_images', 'public');
    }
    $student = Student::create($data);
    $subjects = $request->input('subject');
    $student->subjects()->attach($subjects); 

    return redirect()->route('home')->with('message', 'Created successfully');
}

    public function edit(string $id)
    {
        $students = Student::with('subjects')->find($id);
        $departments = Department::all();
        $subjects = Subject::all();
        return view('edit',['students' => $students, 'departments' =>$departments, 'subjects'=>$subjects]);
    }

    public function update(Request $request, string $id)
    {
       
        $students = Student::find($id);
        $input=$request->except('subject');
        $input['part_time'] = $request->has('part_time');
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('student_images', 'public');
    
        }
        $students->update($input);
        $subjects =$request->input('subject');
        $students->subjects()->sync($subjects);
       
        return redirect()->route('home')->with('message', 'Updated successfully');
    }
    

    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();

        return redirect()->route('home')->with('message', 'Student details was deleted successfully!');
    }

    public function viewdepartment()
    {
       
    $departments = Department::all();
    return view('department', ['departments' => $departments]);
    }

    public function add_department(Request $request)
{
    Department::create($request->all());
    return redirect()->route('add-department')->with('message', 'Department details was added successfully!');
}


    public function d_edit(string $id)
    {
        $departments = Department::find($id);
        return view('d-edit', ['departments' => $departments]);
    }

    public function d_update(Request $request, string $id)
    {
       
        $departments = Department::find($id);
        $input = $request->all();
        $departments->update($input);
        return redirect()->route('add-department')->with('message', 'Updated successfully');
    }
    

    public function d_destroy($id)
{
    $departments = Department::find($id);

    $departments->delete();

    return redirect()->route('add-department')->with('message', 'Department details was deleted successfully!');
}

public function viewPhone()
{
    $phones = Phone::all();
    $students = Student::all();
    return view('phone', ['phones' =>$phones ,'students' => $students ]);
   

}


   
}


