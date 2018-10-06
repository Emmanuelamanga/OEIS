<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function get_school($school_id){
        
        return School::where('school_id', $school_id)->first();
    }
}
