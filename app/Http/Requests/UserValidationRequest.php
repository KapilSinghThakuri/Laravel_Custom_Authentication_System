<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required','min:3','max:255','string'],
            'email' => 'required|email|unique:users',
            'password' => ['required','max:12','min:4'],
        ];
    }
    // ERROR MESSAGE CUSTOMIZATION
    public function messages():array
    {
        return [
            'name.required' => 'User Name Cannot be empty',
            'name.min' => 'Give atleast 3 Character for Username',
            'email.required' => 'User Email Cannot be empty',
        ];
    }
}
