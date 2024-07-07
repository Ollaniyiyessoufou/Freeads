<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class verify_mail_from_request extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'confirm_code' => 'required',
        ];
    }

    public function messages(){
        return [
            'confirm_code.required' => 'Please enter the validation code.',
            // 'confirm_code.min' => 'The validation code must be at least 6 characters long.',
        ];
}
}
