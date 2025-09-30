<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('about', function () {
    return view('about');
})->name('aboutus');




Route::get('/', function () {
    if (Auth::check()) {
        // User is logged in, redirect to dashboard
        return redirect()->route('dashboard');
    } else {
        // User is not logged in, redirect to login
        return redirect()->route('login');
    }
});


// Authentication routes
require __DIR__.'/auth.php';

// Routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Students
    Route::prefix('student')->group(function () {
        Route::get('create', [StudentController::class, 'create'])->name('add-student');
        Route::post('', [StudentController::class, 'store'])->name('store-student');
        Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit-student');
        Route::patch('update/{id}', [StudentController::class, 'update'])->name('update-student');
        Route::delete('{id}/delete', [StudentController::class, 'destroy'])->name('delete-student');
    });

    // Courses
    Route::prefix('courses')->group(function () {
        Route::get('', [CourseController::class, 'index'])->name('course');
        Route::get('create', [CourseController::class, 'create'])->name('add-course');
        Route::post('', [CourseController::class, 'store'])->name('course-add');
        Route::get('edit/{id}', [CourseController::class, 'edit'])->name('edit-course');
        Route::patch('update/{id}', [CourseController::class, 'update'])->name('update-course');
        Route::delete('delete/{id}', [CourseController::class, 'destroy'])->name('delete-course');
    });

    // Payments
    Route::prefix('payments')->group(function () {
        Route::get('', [FeesController::class, 'index'])->name('payments');
        Route::get('create', [FeesController::class, 'create'])->name('add-payment');
        Route::post('', [FeesController::class, 'store'])->name('store-payments');
        Route::get('edit/{id}', [FeesController::class, 'edit'])->name('edit-payment');
        Route::patch('update/{id}', [FeesController::class, 'update'])->name('update-payment');
        Route::delete('{id}/delete', [FeesController::class, 'destroy'])->name('delete-payment');
    });

});
