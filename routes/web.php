<?php

use App\Http\Controllers\CourseController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;







Route::get('/', function () {

    $students =  Student::with('course')->get();

  
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

Route::get('course', [CourseController::class, 'index'])->name('course');

Route::get('add-cours',[CourseController::class,'create'])->name('add-course');


Route::get('edit-course/{id}',[CourseController::class , 'edit'])->name('edit-course');
