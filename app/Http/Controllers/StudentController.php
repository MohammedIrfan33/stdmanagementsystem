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


    public function store(){


        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:students,email',
            'phone'        => 'required|string|max:20',
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


    public function edit(){

        return view('student.update');

    }

    





    public function update(){

    }




    public function distroy(){
       
     }



}
