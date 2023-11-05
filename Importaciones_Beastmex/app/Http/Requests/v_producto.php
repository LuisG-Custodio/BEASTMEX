<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class v_producto extends FormRequest
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
            '_NombreProducto'=>'required|max:250',
            '_NumeroSerie'=>'required|numeric|max:20',
            '_Marca'=>'required|max:250',
            '_NombreProveedor'=>'required|max:250',
            '_Image'=>'required',
            '_Notas'=>'max:250',
        ];
    }
}
