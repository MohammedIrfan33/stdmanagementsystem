<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function index(){


      $courses =  Course::all();

      return view('course',['courses'=>$courses]);
        
     }


     public function create(){

      return view('add_course');
        //create an course
     }

     public function store(){
        //store course in to db
     }

     public function  edit($id){
      $course=Course::find($id);
    
      return view('edit_course',['course' => $course]);
     }

     public  function show() {
        //show single course

     }


     public function  update(){
        //update course  in  db
     }

     public function distroy(){
        //delete course  in db 
     }
}
