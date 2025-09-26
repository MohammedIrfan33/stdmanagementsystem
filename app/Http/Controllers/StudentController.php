<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){


        $students =  Student::with('course')->get();

  
        return view('student.index',['students'=> $students]);
        
    }



    public function show(){

    }

    public function create(){



        return view('student.create',['courses' => Course::all()] );

        


    }


    public function store(Request $request){


        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:students,email',
            'phone'        => 'required|string|max:20|unique:students,phone',
            'course'       => 'required|exists:courses,id',
            'joining_date' => 'required|date',
        ]);


       

        Student::create([
            'name'         => $validated['name'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'],
            'course_id'    => $validated['course'],
            'joining_date' => $validated['joining_date'],
        ]);


        


       return redirect()->route('home');

         




        
    }


    public function edit($id){

       

         $student = Student::findOrFail($id);

          

         $couses = Course::all();

        return view('student.update',['student' => $student, 'courses' => Course::all()] );

    }

    





   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name'         => 'required|string|max:255',
        'email'        => 'required|email|unique:students,email,' . $id,
        'phone'        => 'required|string|max:20|unique:students,phone,' . $id,
        'course'       => 'required|exists:courses,id',
        'joining_date' => 'required|date',
    ]);

    $student = Student::findOrFail($id);

    $student->update([
        'name'         => $validated['name'],
        'email'        => $validated['email'],
        'phone'        => $validated['phone'],
        'course_id'    => $validated['course'],
        'joining_date' => $validated['joining_date'],
    ]);

    return redirect()->route('home')
                     ->with('success', 'Student updated successfully.');
}





    public function distroy($id){

        $student = Student::findOrFail($id);

        $student->delete();

        return   response()->json([
            'message' => 'Course deleted successfully'
        ]);


       
     }



}
