<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

/**
 * Class ContentPage
 *
 * @package App
 * @property string $title
 * @property text $page_text
 * @property text $excerpt
 * @property string $featured_image
 * @property string $video
*/
class ContentPage extends Model
{
    use SoftDeletes, Searchable;

    protected $fillable = ['title', 'slug','page_text', 'excerpt', 'featured_image','video', 'visible', 'featured', 'order', 'views', 'category_id'];


    public function category()
    {
        return $this->belongsTo(ContentCategory::class, 'category_id');
    }

    public function tag_id()
    {
        return $this->belongsToMany(ContentTag::class, 'content_page_content_tag');
    }
    public function setTitleAttribute($input)
    {
        $this->attributes['title'] = $input;
        $this->attributes['slug'] = Str::slug($input);
    }

}
