<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTag
 *
 * @package App
 * @property string $name
 * @property string $slug
 * @property string $category
*/
class ProductTag extends Model
{
    protected $fillable = ['name', 'slug', 'category_id'];
    

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
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    
}
