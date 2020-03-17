<?php

namespace App\Http\Requests;

#use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|min:6',
            'email' => [
                'required', 
                #Rule::unique('users')->ignore($this->route('user')->id)
            ]
        ];
        
        if($this->filled('password')){
            $rules['password'] = ['confirmed', 'min:6'];
        }

        return $rules;
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
            'name'          => 'nombre',
            'email'         => 'correo',
            'password'      => 'contraseña',
            'username'      => 'nombre de usuario',
            'avatar'        => 'imagen'
        ];
    }
}
