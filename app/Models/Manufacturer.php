<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Manufacturer
 *
 * @package App
 * @property string $name
 * @property string $slug
 * @property string $brand
*/
class Manufacturer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'brand'];
    
    public function setNameAttribute($input)
    {
        $this->attributes['name'] = $input;
        $this->attributes['slug'] = str_slug($input);
    }
    
}
