<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experience_record';

    protected $fillable = [
        'session_token',
        'name_of_employer',
        'position_of_job',
        'start_of_employer',
        'end_of_employer',
        'present'
    ];
}
