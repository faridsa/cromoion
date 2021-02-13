<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEncuestasRequest extends FormRequest
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
    public function messages()
    {
        return [
            'empresa.required' => 'Por favor indique el nombre de la empresa o laboratorio',
            'nombre.required' => 'Por favor indique su nombre',
            'pais.required' => 'Indique su país de residencia',
            'atencion_rapidez.required' => 'Cómo evalúa la rapidez en la atención de sus llamados?',
            'atencion_cortesia.required' => 'Cómo evalúa la atención y cortesía de quien lo atendió?',
            'atencion_solucion.required' => 'Cómo evalúa la rapidez con que le dieron una solución a su inquietud?',
            'servicio_cumplimiento_plazos_entrega.required' => 'Cómo evalúa el cumplimiento de los plazos de entrega?',
            'servicio_rapidez_asesoramiento.required' => 'Cómo evalúa el grado de grado de rapidez con que le brindaron el asesoramiento?',
            'servicio_calidad_servicio_postventa.required' => 'Cómo evalúa la calidad del servicio técnico post-venta?',
            'servicio_velocidad_respuesta.required' => 'Cómo evalúa el tiempo de respuesta?',
            'servicio_respuesta_ante_imprevistos.required' => 'Cómo evalúa la respuesta ante imprevistos?',
        ];
    }
}
