<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->route('user');
        return $this->user()->can('update', $user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'dob' => ' required',
            'email' => 'required|string|email|unique:users,email,'. $this->route('user')->id. '|max:55',          
                                            /* permite Actulizar dato NO unique 'email' */
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es Requerido',
            'name.string' => 'El Valor no es correcto',
            'name.max' => 'Solo se permiten 255 carcteres',
            'dob.required' => 'Este campo es Requerido',
            'email.required' => 'Este campo es Requerido',
            'email.max' => 'Solo se permiten 255 carcteres',
            'email.string'  => 'El Valor no es correcto',
            'email.unique'  => 'Este Email ya esta registrado',
        ];
    }
}
