<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:200',
            'nit_number'=>'required|string|max:13|unique:providers,nit_number,'.$this->route('provider')->id.'|max:13',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|max:8',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 catacteres',

            'email.required'=>'Este campo es requerido',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 255 catacteres',

            'nit_number.required'=>'Este campo es requerido',
            'nit_number.string'=>'El valor no es correcto',
            'nit_number.max'=>'Solo se permite 13 catacteres',
            'nit_number.unique'=>'Ya se encuentra registrado',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 255 catacteres',


            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permite 8 catacteres',
        ];
 }
}
