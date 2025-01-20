<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFlotaRequest extends FormRequest
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
            'tipo_vehiculo' => 'required',
            'marca' => 'required',
            'kilometraje' => 'required',
            'capacidad_pasajeros' => 'required',
            'placa' => 'required',
            'modelo' => 'required',
            'cilindraje' => 'required',
            'chasis' => 'required',
            'motor' => 'required',
            'capacidad_carga' => 'required',
        ];
    }
}
