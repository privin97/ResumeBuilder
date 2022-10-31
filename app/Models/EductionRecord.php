<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EductionRecord extends Model
{
    use HasFactory;

    protected $table = 'education_record';

    protected $fillable = [
        'session_token',
        'course_of_education',
        'place_of_education',
        'start_of_education',
        'end_of_education',
    ];
}
