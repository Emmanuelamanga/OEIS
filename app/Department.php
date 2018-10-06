<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Department extends Model
{
    public function get_school($school_id)
    {
        return School::where('school_id',$school_id)->first();
    }
}
