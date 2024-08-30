<?php

namespace App\Http\Controllers;
use App\Models\Student;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $subjects = Subject::with('students')->get();
        return view('subjects', ['subjects' =>$subjects,  'students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:subjects,name']
        ]);
        Subject::create([
            'name' => $request->name
        ]);

        return redirect('subjects')->with('status','Subject Created Successfully');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subjects)
    {
        return view('subjects_edit', ['subjects' =>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subjects)
    {
        
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:subjects,name,'.$subjects->id
            ]
        ]);

        $subjects->update([
            'name' => $request->name
        ]);

        return redirect('subjects')->with('status','Subject Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $subjects =  Subject::find($id);
        $subjects->delete();
        return redirect('subjects')->with('status','Subject Deleted Successfully');
    
    }
}
