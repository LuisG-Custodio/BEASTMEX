<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class v_orden_venta extends FormRequest
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
            '_Cliente'=>'required';
            '_FechaEntrega'=>'required';
            '_Producto'=>'required';
            '_Cantidad'=>'required';
            '_Notas'=>'required';
        ];
    }
}