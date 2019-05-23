<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storevistarequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //metodo opcional para colocar las autorizaciones
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//devuelve un array con reglas
    {
        return [
            //
        'name'       =>'required|max:10',
        'avatar'     =>'required|image',
        'comentario' =>'required',
        'slug'       =>'required'
        ];
    }
}
