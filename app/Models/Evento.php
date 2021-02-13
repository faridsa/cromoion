<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento
 *
 * @package App
 * @property string $nombre
 * @property string $lugar
 * @property time $fecha
 * @property integer $publicado
*/
class Evento extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'lugar', 'fecha', 'visible'];
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFechaAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['fecha'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['fecha'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFechaAttribute($input)
    {
        if ($input != null && $input != '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPublicadoAttribute($input)
    {
        $this->attributes['publicado'] = $input ? $input : null;
    }
    
}
