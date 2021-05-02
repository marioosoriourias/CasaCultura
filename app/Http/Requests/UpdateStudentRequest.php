<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStudentRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'age'  => 'required|numeric|digits_between:1,3',
            'gender'=> 'required',
            'phone' => 'nullable|numeric|digits_between:10,12|unique:students,phone,' . $request->id,
            'email'=> 'nullable|email|unique:students,email,' . $request->id,
            'address' => 'nullable'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'phone' => 'telefono',
            'email' => 'correo electronico',
        ];
    }

    public function messages(){
        return [
        'name.required' => 'Debe ingresar un nombre',
        'age.required' => 'Debe ingresar una edad',
        'gender.required' => 'Debe seleccionar un sexo',
        'phone.unique' => 'El numero de telefono ya se encuentra registrado, ingrese otro',
        'email.unique' => 'El correo electronico ya se encuentra registrado, ingrese otro',
        'period_id.required' => 'Debe seleccionar un periodo'
        ];
    }
}
