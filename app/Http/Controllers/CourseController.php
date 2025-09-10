<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function index(){


      $courses =  Course::latest()->get();

      return view('course.index',['courses'=>$courses]);
        
     }


     public function create(){



      return view('course.create');
        //create an course
     }

     public function store()
     {

      

         // Validate form inputs
         $validated = request()->validate([
             'course_name' => 'required|string|max:255',
             'duration'    => 'required|string|max:100',
             'fee'         => 'required|numeric|min:0',
             'status'      => 'required|in:0,1',
         ]);
     
         
         Course::create([
             'name'     => $validated['course_name'],
             'duration' => $validated['duration'],
             'fees'     => $validated['fee'],
             'status'   => $validated['status'],
         ]);
     
      
         return redirect('/courses')->with('success', 'Course added successfully!');
     }
     

     public function  edit($id){
      $course=Course::find($id);
    
      return view('course.update',['course' => $course]);
     }

     public  function show() {
        //show single course

     }


     public function update($id)
     {
        
         $validated = request()->validate([
             'course_name' => 'required|string|max:255',
             'duration'    => 'required|string|max:100',
             'fee'         => 'required|numeric|min:0',
             'status'      => 'required|in:1,0',
         ]);


         $course = Course::find($id);
     
         if (!$course) {
             return redirect('/courses')->with('error', 'Course not found!');
         }
     
         
         $course->update([
             'name'     => $validated['course_name'],
             'duration' => $validated['duration'],
             'fees'     => $validated['fee'],
             'status'   => (int) $validated['status'],
         ]);
     
         return redirect('/courses')->with('success', 'Course updated successfully!');
     }
     
     public function distroy($id){
      $course = Course::findOrFail($id);

      $course->delete();


      return   response()->json([
        'message' => 'Course deleted successfully'
    ]);

      
        
     }
}
