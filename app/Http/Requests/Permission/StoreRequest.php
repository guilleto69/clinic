<?php

namespace App\Http\Requests\Permission;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return $this->user()->can('create', Permission::class);
    }

    
    public function rules()
    {
            return [
                'name'=> 'required|unique:roles|max:255',
                'description'=> 'required',
                'role_id'=> 'required|numeric',
            ];
    }

    public function messages()
    {
        return[
            'name.required'=>'el Nombre es Requerido',
            'name.unique'=>'el Nombre ya esta siendo usado',
            'description.unique'=>'la Descripcion es Requerida',
            'role_id.required'=> 'El rol_id es Requerido',
            'role_id.numeric'=> 'el rol_id debe ser Numero',
        ];
    }
}
