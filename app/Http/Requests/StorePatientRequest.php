<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'fname' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|max:10',
            'assurance_id' => 'required|exists:assurances,id',
            'iswaiting' => 'boolean',
            'gender' => 'required|in:m,f',
            'cin' => 'nullable|string|max:10',
            'birth-date'=>'nullable|date_format:Y-m-d|before_or_equal:'.date(DATE_ATOM),
        ];
    }
}
