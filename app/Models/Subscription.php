<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscription
 *
 * @package App
 * @property string $name
 * @property string $surname
 * @property string $company
 * @property string $email
*/
class Subscription extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'email', 'company'];
    
    
}
