<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoCurricularRequest extends FormRequest
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
            'exam_name' => 'required|string',
            'exam_year' => 'required|integer',
            'total_candidates' => 'required|integer',
            'attended_candidates' => 'required|integer',
            'a_plus_holder' => 'required|integer',
            'total_pass' => 'required|integer',
            'pass_rate' => 'required|integer',
        ];
    }
}
