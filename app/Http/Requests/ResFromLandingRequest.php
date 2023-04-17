<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResFromLandingRequest extends FormRequest
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
            "fname"=>'string|nullable',
            "lname"=>'string|required',
            "res-date"=>'date|nullable',
            "phone"=>'required | numeric | digits:10 |starts_with:06,07|unique:patients,phone',
        ];
    }
}
