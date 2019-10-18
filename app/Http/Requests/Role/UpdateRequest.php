<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /* public function authorize()
    {
        return true;
    } */

    public function rules()
    {   /* <name> se puede Duplicar en <id> */
        return [
            'name' => 'required|unique:roles,name,' . $this->route('role')->id . '|max:255',
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
        $role = $this->route('role');
        return $this->user()->can('update', $role);
    }
}
