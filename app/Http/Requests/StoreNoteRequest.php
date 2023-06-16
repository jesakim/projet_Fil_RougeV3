<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
            "patient_id"=>'required|exists:patients,id',
            "iswithICE"=>'required|boolean',
            "montant"=>'required|numeric|min:1',
            "date_perso"  => "nullable|date",
        ];
    }
}
