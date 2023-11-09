<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:directors,email',
            'phone' => 'required|string',
            'image' => 'required|file',
            'designation' => 'required|string',
            'biodata' => 'required|string',
            'speech' => 'required|string',
            'subject' => 'required|string',
            'd_c_id' => 'required|integer',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'phone.required' => 'The phone field is required.',
            'image.required' => 'Please upload an image.',
            'designation.required' => 'The designation field is required.',
            'd_c_id.required' => 'The director category field is required.',
        ];
    }
        
}
