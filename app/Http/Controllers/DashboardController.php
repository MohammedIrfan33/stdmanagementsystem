<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Course;
use App\Models\Fee;

class DashboardController extends Controller
{
    public function index()
    {
        // Load all students with their fees and courses to calculate due_payment efficiently
        $students = Student::with(['course', 'fees'])->get()->map(function($student) {
            // append due_payment
            $student->append('due_payment');
            // append balance_day so the view can directly use it
            $student->append('balance_day');
            return $student;
        });
        
        $totalStudents = $students->count();
        $dueStudentsCount = $students->where('due_payment', '>', 0)->count();
        $completedStudentsCount = $students->where('due_payment', '<=', 0)->count();
        $totalDueAmount = $students->where('due_payment', '>', 0)->sum('due_payment');
        
        $courseCount = Course::count();
        $totalFeesCollected = Fee::sum('amount');

        // Lists requested by user
        $dueStudentsList = $students->filter(fn($s) => $s->due_payment > 0)->sortByDesc('created_at')->take(5)->values();
        $completedCourseStudentsList = $students->filter(function($s) {
            // balance_day is something like "-5 days" or "0 days" 
            $daysLeft = (int)$s->balance_day;
            // Only include if it completed within the last 7 days (including today)
            return $daysLeft <= 0 && $daysLeft >= -7;
        })->sortByDesc('created_at')->take(5)->values();

        return view('dashboard', compact(
            'totalStudents', 
            'dueStudentsCount', 
            'completedStudentsCount', 
            'courseCount', 
            'totalFeesCollected', 
            'totalDueAmount',
            'dueStudentsList',
            'completedCourseStudentsList'
        ));
    }
}
