<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @package App
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $zip
 * @property string $city
 * @property string $state
 * @property string $country
 * @property text $comments
 * @property integer $readed
*/
class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'company', 'email', 'phone', 'address', 'zip', 'city', 'state', 'country', 'comments', 'viewed'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setReadedAttribute($input)
    {
        $this->attributes['viewed'] = $input ? $input : null;
    }
    
}
