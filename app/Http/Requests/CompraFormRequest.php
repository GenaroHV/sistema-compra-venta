<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
            'proveedor_id' => 'required',
            'tipo_comprobante' => 'required|string',
            'serie_comprobante' => 'required|numeric',
            #'numero_comprobante' => 'required|numeric',
            'fecha_hora' => 'date',
        ];
    }

    public function attributes()
    {
        return [
            'proveedor_id' => 'proveedor',
            'user_id' => 'comprador',
            'tipo_comprobante' => 'tipo de comprobante',
            'serie_comprobante' => 'serie de comprobante',
            'numero_comprobante' => 'número de comprobante',
            'fecha_hora' => 'fecha de compra'
        ];
    }
}
