<?php

namespace App\Http\Requests\Admin\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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

            'name' => ['nullable', 'string', 'max:45' ,'min:2'],
            'mail' => ['nullable', 'email', 'max:60' ,'min:5'],
            'medicalSystemNumber' => ['nullable', 'numeric', 'digits:6' ],
            'family' => ['nullable', 'string', 'max:45' ,'min:2'],
            'description' => ['nullable', 'string', 'max:250' ,'min:5'],
        ];
    }
}
