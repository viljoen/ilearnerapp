<?php

namespace App\Http\Requests\LearningPlans;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest 
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() 
    {
        return [
			'name' => 'required|max:191',
			'overview' => 'required|string',
			'isActive' => 'required|boolean',
			'course_id' => 'nullable|exists:courses,id',
			'created_by' => 'nullable|exists:users,id',
			'team_id' => 'nullable|exists:teams,id',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
     
        ];
    }

}
