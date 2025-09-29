<?php

namespace App\Http\Controllers;


use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Fee;

class FeesController extends Controller
{
   public function index()
   {

      $fees = Fee::latest()->get();


      return view('payment.index',['fees' => $fees]);
   }

   public function create()
   {

      $students = Student::all();


      return view('payment.create', ['students' => $students]);

   }


   public function store(Request $request)
   {






      $validatedData = $request->validate(
         [
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'payment_mode' => 'required|in:Card,UPI,Cash',
            'note' => 'nullable|string|max:255',
         ],
         [
            'student_id.required' => 'Please select a student or this student does not exist.',
            'student_id.exists' => 'The selected student does not exist.',
            'amount.required' => 'Please enter the payment amount.',
            'amount.numeric' => 'The amount must be a valid number.',
            'amount.min' => 'The amount must be at least 1.',
            'payment_date.required' => 'Please enter the payment date.',
            'payment_date.date' => 'The payment date must be a valid date.',
            'payment_method.required' => 'Please select a payment method.',
            'payment_method.in' => 'The selected payment method is invalid. Choose Card, UPI, or Cash.',
            'note.string' => 'The note must be a valid string.',
            'note.max' => 'The note may not be greater than 255 characters.',
         ]
      );

      try {

         

        $fee =   Fee::create($validatedData);


         return redirect()->route('payments')->with('success', ' Payment added successfully' . $fee->student->name);



      } catch (QueryException $e) {




         return back()->withErrors(['database' => 'Something went wrong while saving the payment. Please try again.'])
            ->withInput();





      }
   }


   //for deleting a payment
  public function destroy($id)
{
    $fee = Fee::find($id);

    if (!$fee) {
        return response()->json(['message' => 'Payment not found'], 404);
    }

    try {
        $fee->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Something went wrong while deleting the payment'], 500);
    }
}

//for editing a payment
public function edit($id)
{
    $fee = Fee::find($id);
    $studentList = Student::all();
     

    return view('payment.update', ['fee' => $fee,'students' => $studentList]);


}
}