<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessagesRequest extends FormRequest
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
            'zip' => 'min:4|max:8',
            'city' => 'required',
            'country' => 'required',
            'message' => 'required',
            'viewed' => 'max:1|nullable|numeric',
        ];
    }
}
