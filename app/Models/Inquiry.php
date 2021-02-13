<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inquiry
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $company
 * @property string $phone
 * @property string $product
 * @property integer $view
 * @property integer $replied
*/
class Inquiry extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'company', 'phone','country', 'product', 'viewed', 'replied'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setViewAttribute($input)
    {
        $this->attributes['view'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRepliedAttribute($input)
    {
        $this->attributes['replied'] = $input ? $input : null;
    }
    
}
