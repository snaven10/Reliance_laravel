<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'branch_office'=> ['required','string','max:255'],
            'direction'=> ['required','string'],
        ];
    }

    public function messages()
    {
        return [
            'branch_office.required' => 'El campo :attribute es obligatorio.',
            'direction.required' => 'El campo de :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'branch_office' => 'Sucursal',
            'direction' => 'Direccion',
        ];
    }
}
