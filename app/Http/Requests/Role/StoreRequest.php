<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
        public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=> 'required|unique:roles|max:255',
            'description'=> 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'el Nombre es Requerido',
            'name.unique'=>'el Nombre ya esta siendo usado',
            'description.unique'=>'la Descripcion es Requerida',
        ];
    }

    public function authorize()
    {
        return $this->user()->can('create', Role::class);
    }
}
