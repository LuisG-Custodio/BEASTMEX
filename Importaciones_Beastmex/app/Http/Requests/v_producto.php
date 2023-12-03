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
            '_NumeroSerie'=>'required',
            '_Marca'=>'required|max:250',
            '_Costo'=>'required|numeric|decimal:0,2',
            '_Stock'=>'required|numeric|max_digits:7',
            '_NombreProveedor'=>'required|max:250',
            '_Image'=>'required',
        ];
    }
}
