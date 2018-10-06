<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_unit extends Model
{
    protected $table = 'student_units';

      protected $fillable = [
        'student_id', 'unit_id', 
    ];
}
