<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeesController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', [StudentController::class, 'index'])->name('home');

Route::get('student/create', [StudentController::class, 'create'])->name('add-student');
Route::post('student', [StudentController::class, 'store'])->name('store');
Route::get('student/edit/${id}', [StudentController::class, 'edit'])->name('edit');
Route::patch('student/update/${id}', [StudentController::class, 'update'])->name('update');
Route::delete('student/{id}/delete', [StudentController::class, 'distroy'])->name('delete');

Route::get('about', function () {
    return view('about');
})->name('aboutus');



Route::get('courses', [CourseController::class, 'index'])->name('course');
Route::get('courses/create', [CourseController::class, 'create'])->name('add-course');
Route::post('courses', [CourseController::class, 'store'])->name('course-add');
Route::get('courses/edit/{id}', [CourseController::class, 'edit'])->name('edit-course');
Route::patch('courses/update/{id}', [CourseController::class, 'update'])->name('update-course');
Route::delete('courses/delete/{id}', [CourseController::class, 'distroy'])->name('delete-course');


Route::get('payements',[FeesController::class , 'index'])->name('payments');
Route::get('payements/create',[FeesController::class , 'create'])->name('add-payment');
Route::post('payements',[FeesController::class , 'store'])->name('store-payments');
Route::delete('payements/{id}/delete',[FeesController::class , 'destroy'])->name('delete-payment');
Route::get('payements/edit/{id}',[FeesController::class , 'edit'])->name('edit-payment');


