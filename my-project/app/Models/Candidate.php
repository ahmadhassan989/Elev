<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class Candidate extends Model
{
    protected $collection = 'candidates';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'uuid',
        'career_level',
        'job_major',
        'years_of_experience',
        'degree_type',
        'skills',
        'nationality',
        'city',
        'salary',
        'gender'
    ];

}
