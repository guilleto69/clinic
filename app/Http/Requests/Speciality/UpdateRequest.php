<?php

namespace App\Http\Requests\Speciality;

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
        $speciality = $this->route('speciality');
        return $this->user()->can('update', $speciality);
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:specialities,name,' . $this->route('speciality')->id .'|max:255',
        ]; // ,name' .$this->route.... para dejar MISMO nombre al Editar
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es Requerido',
            'name.unique' => 'El Nombre ya esta en uso',
        ];
}
}