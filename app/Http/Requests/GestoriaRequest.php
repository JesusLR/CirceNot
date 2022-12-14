<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GestoriaRequest extends FormRequest
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
            'nomNotaria' => 'required',
            'numNotaria' => 'required',
            'domicilioNotaria' => 'required',
            'emailNotaria' => 'required',
            'telNotaria' => 'required',
            'logoNotaria' => 'required',
            'nomNotario' => 'required',
            'apellitoPatNotario' => 'required',
            'apellitoMatNotario' => 'required',
            'direccionNotario' => 'required',
            'correoNotario'  => 'required',
            'telNotario'  => 'required',
            'celNotario'  => 'required',
            'profesionNotario'  => 'required',
            'curpNotario'  => 'required',
            'rfcNotario'  => 'required',
            'fechaNombNotario' => 'required',
            'fileNombramientoNotario' => 'required',
        ];
    }

    // public function messages(){
    //     return[
    //         'nomNotaria.required' => '',
    //         'numNotaria.required' => '',
    //         'domicilioNotaria.required' => '',
    //         'emailNotaria.required' => '',
    //         'telNotaria.required' => '',
    //         'logoNotaria.required' => '',
    //         'nomNotario.required' => '',
    //         'apellitoPatNotario.required' => '',
    //         'apellitoMatNotario.required' => '',
    //         'direccionNotario.required' => '',
    //         'correoNotario.required'  => '',
    //         'telNotario.required'  => '',
    //         'celNotario.required'  => '',
    //         'profesionNotario.required'  => '',
    //         'cnomNotariaurpNotario.required'  => '',
    //         'rfcNotario.required'  => '',
    //         'fechaNombNotario.required' => '',
    //         'fileNombramientoNotario.required' => '',
    //     ];
    // }
}

