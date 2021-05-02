<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
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
                'name' =>  [
                    'required', 
                     Rule::unique('courses')
                           ->where('name', $request->name)
                           ->where('period_id', $request->period_id)
                ],
     
                'period_id' => 'required'
        ];
    }

    public function messages(){
        return [
        'name.required' => 'Debe ingresar un nombre',
        'name.unique' => 'Ya existe un curso con ese nombre en el periodo seleccionado',
        'period_id.required' => 'Debe seleccionar un periodo'
        ];
    }
}
