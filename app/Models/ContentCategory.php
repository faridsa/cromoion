<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ContentCategory
 *
 * @package App
 * @property string $title
 * @property string $slug
*/
class ContentCategory extends Model
{
    protected $fillable = ['title', 'slug'];

    public function setTitleAttribute($input)
    {
        $this->attributes['title'] = $input;
        $this->attributes['slug'] = Str::slug($input);
    }
}
