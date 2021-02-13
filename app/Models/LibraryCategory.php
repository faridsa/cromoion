<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LibraryCategory
 *
 * @package App
 * @property string $name
*/
class LibraryCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
