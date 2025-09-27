<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    protected $fillable = [
        'student_id',
        'amount',
        'payment_date',
        'payment_mode',
        'note',
    ];

    protected $casts = [ 'payment_date' => 'datetime', ];


    use HasFactory;
    

    //Fees belongs to student 


    public function  student(){


         return  $this-> belongsTo(Student::class);

    }


    public function getPaymentDateFormattedAttribute()
    {
        return $this->payment_date->format('d M, Y');
    }
}
