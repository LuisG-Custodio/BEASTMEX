<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class v_cliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '_NombreEmpresa'=>'required|max:250',
            '_RFC'=>'required|between:12,13',
            '_Telefono'=>'required|numeric|digits:10',
            '_Correo'=>'required|email:rfc,dns',
            '_Direccion'=>'required|max:250',
            '_Notas'=>'max:250'
        ];
    }
}
