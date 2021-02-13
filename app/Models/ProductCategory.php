<?php
namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class ProductCategory
 *
 * @package App
 * @property string $name
 * @property text $description
 * @property string $parent
 * @property string $photo
*/
class ProductCategory extends Model
{
    //use Searchable, \Kalnoy\Nestedset\NodeTrait;
    use Searchable;

    public $asYouType = true;

    protected $fillable = ['name', 'slug', 'description', 'photo', 'parent_id'];


    public function setNameAttribute($input)
    {
        $this->attributes['name'] = $input ? $input : null;
        $this->attributes['slug'] = $input ? Str::slug($input) : null;
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setParentIdAttribute($input)
    {
        $this->attributes['parent_id'] = $input ? $input : null;
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('name');
    }

    public function scopeNoChildren($query)
    {
     $query = \DB::select( \DB::raw("SELECT c1.id, c1.name FROM product_categories c1 LEFT JOIN product_categories c2 ON c2.parent_id = c1.id WHERE c2.id IS NULL"));
     return $query;
    }

    public function childrenRecursive()
    {
       return $this->children()->with('childrenRecursive');
    }

    public function products()
    {
        return $this->hasMany('App\Producto', 'category_id'); // This only gets the products of the CURRENT category
    }

    public function allProducts()
    {
        return $this->hasManyThrough('App\Product', 'App\children');
    }



}
