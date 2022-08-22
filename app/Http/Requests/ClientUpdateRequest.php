<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            //
        'name'=> 'string|max:250',
        'nit'=> 'string|required|unique:clients,nit,'.$this->route('nit')->id.'|max:20',
        'direccion'=> 'string|max:255',
        'telefono'=> 'string|max:8',
        ];
    }
    public function messages(){
        return[
            'name.string'=>'este campo es requerido',
            'name.max'=>'solo se permite 255 caracteres',

            'nit.string'=>'solo se permite 255 caracteres',
            'nit.required'=>'este campo es requerido',

            'direccion.string'=>'El valor no es correcto',
            'direccion.max'=>'El campo es required',

            'telefono.string'=>'este campo es requerido',
            'telefono.max'=>'este campo solo permite 255 caracteres',

        ];
    }
}
