<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpdatePeriodRequest extends FormRequest
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
            'name' => 'required|unique:periods,name,' . $request->id,
            'email' => 'nullable|email|unique:patients,email,' . $request->id,
            'start_date' => 'required',
            'end_date' => 'required|after:today'
        ];
    }

    public function messages(){
       
        return [
            'name.required' => 'Debe ingresar un nombre',
            'name.unique' => 'Ya existe un periodo con ese nombre',
            'start_date.required' => 'Debe seleccionar una fecha de inicio',
            'end_date.required' => 'Debe seleccionar una fecha de termino',
            'end_date.after' => 'La fecha debe ser mayor al dia de hoy'
        ];
    }
}
