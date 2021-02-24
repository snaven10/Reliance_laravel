<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'code' => ['required','string'],
            'shelvest' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'El campo :attribute es obligatorio',
            'shelvest.required' => 'El campo :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Codigo',
            'shelvest' => 'Nombre de estante',
        ];
    }
}
