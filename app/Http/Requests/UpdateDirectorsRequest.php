<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirectorsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email,',
            'phone' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'biodata' => 'required|string',
            'speech' => 'required|string',
            'subject' => 'required|string',
            'd_c_id' => 'required|integer',
            'image' => 'image|file', 
        ];
    }
}
