<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
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


Route::get('course', function () {

    $courses = [
        [
            'name' => 'Web Development',
            'duration' => '6 months',
            'fees' => 30000,
            'status' => 'active'
        ],
        [
            'name' => 'Data Science',
            'duration' => '1 year',
            'fees' => 60000,
            'status' => 'active'
        ],
        [
            'name' => 'Graphic Design',
            'duration' => '3 months',
            'fees' => 15000,
            'status' => 'inactive'
        ],
        [
            'name' => 'Cyber Security',
            'duration' => '8 months',
            'fees' => 40000,
            'status' => 'active'
        ],
        [
            'name' => 'Android App Development',
            'duration' => '5 months',
            'fees' => 25000,
            'status' => 'inactive'
        ],
        [
            'name' => 'Digital Marketing',
            'duration' => '4 months',
            'fees' => 20000,
            'status' => 'active'
        ],
        [
            'name' => 'Machine Learning',
            'duration' => '10 months',
            'fees' => 55000,
            'status' => 'active'
        ],
        [
            'name' => 'UI/UX Design',
            'duration' => '4 months',
            'fees' => 18000,
            'status' => 'inactive'
        ]
    ];
   
    return view('course',['courses'=>$courses]);
})->name('course');