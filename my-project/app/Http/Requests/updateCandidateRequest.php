<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'required|email|unique:users,email,'. $this->route('id').',id',
            'career_level' => 'in:Junior,Senior,Mid Level',
            'job_major' => 'string|max:255',
            'years_of_experience' => 'integer|min:0',
            'degree_type' => 'in:Bachelor,Master,High School,bachelor,master,high school',
            'skills' => 'array',
            'skills.*' => 'string|max:255',
            'nationality' => 'string|max:255',
            'city' => 'string|max:255',
            'salary' => 'numeric|min:0',
            'gender' => 'string',
            'gender.*' => 'in:Male,Female,Not Specified, male, female, not specified'
        ];
    }
    
}
