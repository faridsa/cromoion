<?php
namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property string $slug
 * @property text $description
 * @property decimal $price
 * @property string $category
 * @property string $manufacturer
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
 * @property string $pdf
 * @property string $video
 * @property string $link
 * @property integer $featured
 * @property integer $visible
*/
class Product extends Model
{
    use Searchable,  SoftDeletes;
    public $asYouType = true;

    protected $fillable = ['name', 'slug', 'description', 'price', 'photo1', 'photo2', 'photo3', 'pdf', 'video', 'link', 'featured', 'visible', 'category_id', 'manufacturer_id'];

    public function toSearchableArray()
    {
        //$array =  $this->with("category")->toArray();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['description'] = $this->description;
        $array['slug'] = $this->slug;
        $array['category'] = $this->category->slug;
        return $array;
    }

    public function setNameAttribute($input)
    {
        $this->attributes['name'] = $input ? $input : null;
        $this->attributes['slug'] = $input ? Str::slug($input) : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setManufacturerIdAttribute($input)
    {
        $this->attributes['manufacturer_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setFeaturedAttribute($input)
    {
        $this->attributes['featured'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setVisibleAttribute($input)
    {
        $this->attributes['visible'] = $input ? $input : null;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function scopePublished($query)
     {
         return $query->where('visible', 1);
     }

}
