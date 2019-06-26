<?php

namespace App\Http\Requests\Doctor;

use App\Models\VirtualNumbers;
use Illuminate\Foundation\Http\FormRequest;

class requestStoreOffice extends FormRequest
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
        //$virtualNumbers = VirtualNumbers::

        $virtualNumbers = auth()->user()->generalDoctor->virtualNumbers()->get()->pluck('id')->toArray();
        $virtualNumbers =implode(",", $virtualNumbers);

        return [
            'officeName' => ['required', 'string', 'max:45' ,'min:2'],
            'virtualNumber' => ['required', 'numeric', 'in:'.$virtualNumbers],
            'mobileTel' => ['required', 'numeric', 'digits:11' , 'regex:/^0[0-9]{10}$/'],
            'officeType' => ['required', 'string', 'in:personalOffice,clinic'],
            'address1' => ['nullable', 'string', 'max:250' ,'min:2'],
            'address2' => ['nullable', 'string', 'max:250' ,'min:2'],
        ];
    }
}
