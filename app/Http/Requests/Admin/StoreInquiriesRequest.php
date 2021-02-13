<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreInquiriesRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required',
            'product' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Por favor indique tu nombre',
            'email.required' => 'Por favor indique tu email de contacto',
            'email.email' => 'La dirección de email no parece correcta',
            'company.required' => 'Por favor indique el nombre de la empresa o laboratorio',
            'phone.required' => 'Por favor indique un telefono de contacto',
        ];
    }
}
