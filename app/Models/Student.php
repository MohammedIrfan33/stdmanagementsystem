<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ["name","email","phone","joing_date","course_id","joining_date"];


    protected $casts = [
        'joining_date' => 'date',
    ];



    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


    public function getJoiningDateFormattedAttribute()
    {
        return $this->joining_date->format('d M, Y');
    }






    // Accessor for End Dat
    public function getEndDateAttribute()
    {
        if ($this->course && $this->joining_date) {
            $durationParts = explode(' ', strtolower(trim($this->course->duration)));

            $number = (int) $durationParts[0];


            $endDate = $this->joining_date->addMonths($number);

            return $endDate->format('d M, Y');
        }

        return null;
    }


    public function getBalanceDayAttribute()
    {

        $end = $this->end_date; 
        $DateEnd =  Carbon::createFromFormat('d M, Y', $end);;
        $today = Carbon::now();


        $balnceDays = $today->diffInDays($DateEnd, false, true);







        return ceil($balnceDays).' days';
    }

}
