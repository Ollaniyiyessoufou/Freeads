<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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

            'title'=>'required|max:255',
            'description'=>'required',
            'location'=>'required',
            'price'=>'required|numeric|gt:0',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];
    }

    public function message()
    {
        return[
            'title'=>'Title field can not be empty',
            'description'=>'Description field can not be empty',
            'location'=>'Location field can not be empty',
            'price'=>'Price field can not be empty',
            'image' => 'An ad should at least have an image',
        ];
    }
}
