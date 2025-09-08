<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Course  extends Model{

    use HasFactory;

    protected $fillable = ["name","duration","fees","status"];

    public static function find($id){
        $courses =  Course::all();


    $current_course = null;

   
    foreach($courses as $course  ){

        if($course['id']==$id){

            $current_course = $course;

            
            break;
        }
    }


    return  $current_course;
    }
}





?>