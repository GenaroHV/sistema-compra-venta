<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CategoriaFormRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                'min:4',
                Rule::unique('categories')->ignore($this->route('categoria'))
            ],
            'descripcion' => 'nullable'
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
            'descripción' => 'descripción'
        ];
    }
}
