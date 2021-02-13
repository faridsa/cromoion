<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 *
 * @package App
 * @property string $key
 * @property string $value
*/
class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'value'];
    
    
}
