<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slideshow
 *
 * @package App
 * @property string $titulo
 * @property string $image_desktop
 * @property string $image_mobile
 * @property text $texto
 * @property string $link
 * @property integer $publicado
 * @property integer $order
*/
class Slideshow extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'image_desktop','image_mobile', 'texto', 'link', 'texto_boton', 'published', 'order'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPublicadoAttribute($input)
    {
        $this->attributes['publicado'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOrderAttribute($input)
    {
        $this->attributes['order'] = $input ? $input : null;
    }
    
}
