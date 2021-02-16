<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:25|unique:users',
            'email'=> 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo de attribute: es obligatorio.',
            'name.email' => 'El correo debe ser una dirección de correo electrónico válida.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La contraseña no coincide',
        ];
    }
}
