<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'name'  => 'required',
            'major' => 'required',
            'age'   => 'required',
            'phone' => 'required|min:11|regex:/(0)[0-9]{9}/',
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
            'name.required' => 'Student Name field is requied.',
            'phone.min'     => 'Phone number must be at least 11 characters.',
            'phone.regex'   => 'Phone number format is invalid.',
        ];
    }
}
