<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInquiriesRequest extends FormRequest
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
            'email' => 'email',
            'company' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'view' => 'max:1|nullable|numeric',
            'replied' => 'max:1|nullable|numeric',
        ];
    }
}
