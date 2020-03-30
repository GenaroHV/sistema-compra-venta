<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'codigo' => 'required|min:4|max:8',
            'nombre' => 'required|string|min:3|max:50',
            'descripcion' => 'max:255',
            'precio' => 'required|numeric',
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|file|max:2048',
            'categorias' => 'required'
        ];
    }

    public function messages()
    {
        return [
           //
        ];
    }

    public function attributes()
    {
        return [
            'avatar' => 'imagen del producto'
        ];
    }
}
