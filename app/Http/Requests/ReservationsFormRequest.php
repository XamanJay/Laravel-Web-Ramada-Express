<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationsFormRequest extends FormRequest
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
            'nombre' => 'required|min:5|max:70',
            'apellidos' => 'required|min:5|max:255'
        ];
    }
    public function message(){
        return [
            'nombre.required' => 'Usuario, el :attribute es obligatorio.'
        ];
    }




}
