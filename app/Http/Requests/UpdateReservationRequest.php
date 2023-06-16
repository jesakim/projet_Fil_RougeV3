<?php

namespace App\Http\Requests;

use App\Rules\notSunday;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'date' =>['required','date_format:Y-m-d\\TH:i','after_or_equal:today', new notSunday]
        ];
    }
}
