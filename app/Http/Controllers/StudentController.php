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

       

        Student::create(
            [
                'name' => request()->name,
                'email' =>request()->email,
                'phone' => request()->phone,
                'course_id' => request()->course,
                'joining_date'=> request()->joining_date
            ]

            );

         




        
    }


    public function edit(){

        return view('student.update');

    }

    





    public function update(){

    }




    public function distroy(){
       
     }



}
