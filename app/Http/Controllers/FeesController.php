<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;

class FeesController extends Controller
{
     public function index(){


        return view('payment.index');
     }

     public function create(){

       $students = Student::all();


      return view('payment.create',['students'=>$students]);

     }
}
