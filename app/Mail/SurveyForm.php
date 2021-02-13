<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SurveyForm extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $empresa;
    public $pais;
    public $atencion_rapidez;
    public $atencion_cortesia;
    public $atencion_solucion;
    public $servicio_cumplimiento_plazos_entrega;
    public $servicio_rapidez_asesoramiento;
    public $servicio_calidad_servicio_postventa;
    public $servicio_velocidad_respuesta;
    public $servicio_respuesta_ante_imprevistos;
    public $comentarios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->nombre = $request->nombre;
        $this->empresa = $request->empresa;
        $this->pais = $request->pais;
        $this->atencion_rapidez = $request->atencion_rapidez;
        $this->atencion_cortesia = $request->atencion_cortesia;
        $this->atencion_solucion = $request->atencion_solucion;
        $this->servicio_cumplimiento_plazos_entrega = $request->servicio_cumplimiento_plazos_entrega;
        $this->servicio_rapidez_asesoramiento = $request->servicio_rapidez_asesoramiento;
        $this->servicio_calidad_servicio_postventa = $request->servicio_calidad_servicio_postventa;
        $this->servicio_velocidad_respuesta = $request->servicio_velocidad_respuesta;
        $this->servicio_respuesta_ante_imprevistos = $request->servicio_respuesta_ante_imprevistos;
        $this->comentarios = $request->comentarios;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = 'Encuesta desde el sitio web';
        return $this->from('no-reply@cromoion.com.ar', 'Cromoion')
            ->subject($subject)
            ->view('public.emails.encuesta');
    }
}
