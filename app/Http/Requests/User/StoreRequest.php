<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        return $this->user()->can('create', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'required|numeric',
            'name' => 'required|string|max:255',
            'dob' => ' required',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'role.required' => 'Este campo es Requerido',
            'role.numeric' => 'El Valor no es correcto',
            'name.required' => 'Este campo es Requerido',
            'name.string' => 'El Valor no es correcto',
            'name.max' => 'Solo se permiten 255 carcteres',
            'dob.required' => 'Este campo es Requerido',
            'email.required' => 'Este campo es Requerido',
            'email.max' => 'Solo se permiten 255 carcteres',
            'email.string'  => 'El Valor no es correcto',
            'email.unique'  => 'Este Email ya esta registrado',
            'password.required' => 'Este campo es Requerido',
            'password.string'  => 'El Valor no es correcto',
            'password.min' => 'La contraseña debe de tenr al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas NO coinciden', 
        ];
    }
}
