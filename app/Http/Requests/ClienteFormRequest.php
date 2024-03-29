<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nombre' => 'required|string|min:4|max:50',
            'tipo_documento' => 'required|string', 
            #'numero_documento' => 'required|numeric|min:8|max:10', 
            'direccion' => 'string|max:250', 
            #'telefono' => 'numeric|min:8|max:12', 
            'email' => 'email'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre',
            'tipo_documento' => 'tipo de documento', 
            'numero_documento' => 'número de documento', 
            'direccion' => 'dirección', 
            'telefono' => 'teléfono', 
            'email' => 'correo electrónico'
        ];
    }
}
