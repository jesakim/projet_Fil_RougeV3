<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'service_name'=>'required_without:service_id|nullable|string',
            'service_id'=>'required_without:service_name|nullable|string',
            'patient_id'=>'required|exists:patients,id',
            'price'=>'required|integer',
            'comment'=>'string|nullable',
            'status'=>'required|boolean',
            'dents'=>'array|required',

        ];
    }
}
