<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'userNombre' => 'required',
            'userApellidoP' => 'required',
            'userApellidoM' => 'required',
            'userUsuario' => 'required',
            'userPermiso' => 'required',
            'userPuesto' => 'required',
            'userEmail' => 'required',
            'userEmailDos' => 'required',
            'userPassword' => 'required',
            'userTEL' => 'required',
            'userRFC'  => 'required',
            'userCURP'  => 'required',
        ];
    }
}
