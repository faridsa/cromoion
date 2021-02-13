<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
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
            'surname' => 'required',
            'company' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor indica tu nombre',
            'name.required' => 'Por favor indica tu apellido',
            'company.required' => 'Por favor indica el nombre de la empresa o laboratorio',
            'email.required'  => 'Por favor indica tu email',
            'email.email'  => 'Esta dirección de email no parece correcta',
        ];
    }
}
