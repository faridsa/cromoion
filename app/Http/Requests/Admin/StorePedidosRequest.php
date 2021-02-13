<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidosRequest extends FormRequest
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
            'empresa' => 'required',
            'nombre' => 'required',
            'email' => 'required|email',
            'tipo_de_producto' => 'required',
            'pais' => 'required',
            'comentarios' => 'required',
            'otro' => 'required_if':'tipo_de_producto','otro',
        ];
    }
}
