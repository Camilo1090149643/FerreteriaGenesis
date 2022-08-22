<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|unique:products,name,'. $this->route('product')->id. '|max:255',
            'purchase_price'=>'required',
            'sell_price'=>'required',
            'category_id'=>'integer|required',
            'provider_id'=>'integer|required',




        ];
    }

    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.unique'=>'Ya existe un producto con este nombre',

            'purchase_price.required'=>'Este campo es requerido',
            'sell_price.required'=>'Este campo es requerido',
            'category_id.required'=>'Este campo es requerido',
            'provider_id.required'=>'Este campo es requerido',



        ];
    }
}
