<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEncuestasRequest extends FormRequest
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
            'pais' => 'required',
            'atencion_rapidez' => 'required',
            'atencion_cortesia' => 'required',
            'atencion_solucion' => 'required',
            'servicio_cumplimiento_plazos_entrega' => 'required',
            'servicio_rapidez_asesoramiento' => 'required',
            'servicio_calidad_servicio_postventa' => 'required',
            'servicio_velocidad_respuesta' => 'required',
            'servicio_respuesta_ante_imprevistos' => 'required',
        ];
    }
}
