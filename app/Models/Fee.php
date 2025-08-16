<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    use HasFactory;
    

    //Fees belongs to student 


    public function  student(){


         return  $this-> belongsTo(Student::class);

    }
}
