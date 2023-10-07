<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates|max:255',
            'uuid' => 'required|string|unique:candidates|max:255',
            'career_level' => 'in:Junior,Senior,Mid Level',
            'job_major' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'degree_type' => 'in:Bachelor,Master,High School,bachelor,master,high school, ',
            'skills' => 'array',
            'skills.*' => 'string|max:255',
            'nationality' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'gender' => 'string',
            'gender.*' => 'in:Male,Female,Not Specified, male, female, not specified'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
