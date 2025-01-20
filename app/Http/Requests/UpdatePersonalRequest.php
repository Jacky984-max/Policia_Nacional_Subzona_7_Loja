<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            //

            'cedula' => 'required',
            'nombres' => 'required',
            'apellidos'  => 'required',
            'fecha_nacimiento' => 'required',
            'tipo_sangre'  => 'required',
            'ciudad_nacimiento'  => 'required',
            'celular'  => 'required',
            'rango'  => 'required',
        ];
    }
}
