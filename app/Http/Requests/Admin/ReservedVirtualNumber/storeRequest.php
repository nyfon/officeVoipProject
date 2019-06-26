<?php

namespace App\Http\Requests\Admin\ReservedVirtualNumber;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'number' => ['required', 'numeric', 'digits:11'],
            'isVipNumber' => ['required', 'numeric', 'max:255', 'min:0'],
            'isActive' => ['required', 'string', 'in:active,onactive'],
        ];
    }
}
