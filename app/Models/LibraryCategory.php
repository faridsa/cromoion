<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LibraryCategory
 *
 * @package App
 * @property string $name
*/
class LibraryCategory extends Model
{

    protected $fillable = ['name'];
    protected $hidden = [];



}
