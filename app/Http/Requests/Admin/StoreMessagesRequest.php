<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessagesRequest extends FormRequest
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
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'comments' => 'required',
            'surname'   => 'honeypot',
            'token2'   => 'required|honeytime:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor indique su nombre y apellido',
            'company.required' => 'Por favor indique el nombre de la empresa o laboratorio',
            'phone.required'  => 'Por favor indique un teléfono de contacto',
            'email.required'  => 'Por favor indique su email',
            'email.email'  => 'Esta dirección de email no parece correcta',
            'city.required'  => 'Por favor indique su ciudad de residencia',
            'country.required'  => 'Por favor indique su país de residencia',
            'comments.required' => 'Por favor ingrese un mensaje',
        ];
    }
}
