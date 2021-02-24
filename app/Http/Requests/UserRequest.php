<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function rules(Request $request)
    {
        if (Request::isMethod('POST')) {
            $rules = [
                'name' => 'required|string|max:25|unique:users',
                'email'=> 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ];
        }
        if(Request::isMethod('PUT')){
            $rules = [
                'name' => ['required','string','max:25',Rule::unique('users')->ignore($request->user)],
                'email'=> ['required','string','email','max:255',Rule::unique('users')->ignore($request->user)],
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio.',
            'name.email' => 'El correo debe ser una dirección de correo electrónico válida.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La contraseña no coincide',
        ];
    }
}
