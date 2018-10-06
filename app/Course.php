<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     public function get_department($department_id)
    {
        return Department::where('department_id',$department_id)->first();
    }

    public function get_course($course_id){
         return Course::where('course_id',$course_id)->first();
    }
}
