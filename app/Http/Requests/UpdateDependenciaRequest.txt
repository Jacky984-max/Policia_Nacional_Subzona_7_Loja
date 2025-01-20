<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDependenciaRequest extends FormRequest
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

            'provincia' => 'required' ,
            'cod_distrito' => 'required',
            'cod_circuito' => 'required',
            'cod_sub_circuito' => 'required',
            'numero_distrito' => 'required',
            'nombre_distrito' => 'required',
            'nombre_circuito' => 'required',
            'nombre_sub_circuito' => 'required',
            'parroquia' => 'required',
            'numero_circuito' => 'required',
            'numero_sub_circuito' => 'required',
            
        ];
    }
}
