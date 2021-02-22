<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LibraryItem
 *
 * @package App
 * @property string $name
 * @property text $description
 * @property string $category
 * @property string $pdf
 * @property string $published
 * @property string $uuid
*/
class LibraryItem extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'pdf', 'published', 'uuid', 'category_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsTo(LibraryCategory::class, 'category_id');
    }

    public function scopePublished($query)
     {
         return $query->where('published', 1);
     }
    
}
