<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormRequest extends FormRequest
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
            'login'=>'required|min:3|regex:/^\S.*\S$/',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required|regex:/^\S.*\S$/',
           'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/|confirmed',
        ];
    }

    public function messages(){
        return [
            'login.required' => 'The login field is required.',
            'login.min' => 'The login field must contain at least 3 characters.',
            'login.regex:/^\S.*\S$/' => 'The login field must not contain a space neither at the beginning nor at the end.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be in the form .....@......',
            'email.required' => 'Your email is already used.',

            'password.required' => 'The password field is required.',
            'password.regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/' => 'The password must contain at least (8 characters, uppercase, lowercase, number, special character).',
            'password.confirmed' => 'The passwords don\'t match',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.regex:/^\S.*\S$/' => 'The phone number field must not contain a space neither at the beginning nor at the end.',

        ];
    }

}