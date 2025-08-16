<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    

    public function fees()
    {
        return $this->hasMany(Fee::class); 
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function getJoiningDateAttribute()
{
    $rawDate = $this->attributes['joining_date'] ?? null;

    return $rawDate
        ? Carbon::parse($rawDate)->format('d M, Y')
        : null;
}


    // Accessor for End Dat
    public function getEndDateAttribute()
    {
        if ($this->course && $this->joining_date) {
            $durationParts = explode(' ', strtolower(trim($this->course->duration)));

            $number = (int) $durationParts[0];
            $unit = $durationParts[1] ?? 'month';

            return Carbon::parse($this->joining_date)->add($number, $unit)->format('d M, Y');
        }

        return null;
    }
    
}
