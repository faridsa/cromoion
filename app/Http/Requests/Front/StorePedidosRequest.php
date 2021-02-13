<?php
namespace App\Http\Requests\Front;

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
            'comentarios' => 'required',
            'pais' => 'required',
            'otro' => 'required_if:tipo_de_producto,otro',
        ];
    } 

    public function messages()
    {
        return [
            'empresa.required' => 'Por favor ingresa el nombre de la empresa o laboratorio',
            'nombre.required' => 'Por favor ingresa tu nombre',
            'email.required' => 'Por favor ingresas tu email',
            'email.email' => 'Esta dirección de email no parece correcta',
            'tipo_de_producto.required' => 'Por favor selecciona un tipo de producto',
            'comentarios.required' => 'Por favor ingresa el detalle de productos',
            'pais.required' => 'Por favor indica tu país',
            'otro.required_if' => 'Especifica el tipo de producto deseado',
        ];
    }
}
