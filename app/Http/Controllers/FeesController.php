<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesController extends Controller
{
     public function index(){


        return view('payment.index');
     }
}
