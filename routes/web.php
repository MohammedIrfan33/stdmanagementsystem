<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;







Route::get('/', function () {

    $students =  Student::all();

  
    return view('index',['students'=> $students

]);
})->name('home');




Route::get('about', function () {
    return view('about');
})->name('aboutus');



Route::get('update', function () {
    return view('edit');
})->name('edit');



Route::get('add', function () {
    return view('add');
})->name('add');


Route::get('add-course', function () {
    return view('add_course');
})->name('add-course');


Route::get('course', function ()  {
    

    $courses =  Course::all();




    
   
    return view('course',['courses'=>$courses]);
})->name('course');


Route::get('edit-course/{id}', function ($id)  {


    $course=Course::find($id);
    
    return view('edit_course',['course' => $course]);

})->name('edit-course');
