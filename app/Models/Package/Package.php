<?php

namespace App\Models\Package;

use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Sluggable,HasFactory;

    protected $table = "packages";

    protected $path = 'uploads/package';

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'overview',
        'summary',
        'difficulty_level',
        'no_of_days',
        'no_of_nights',
        'country_id',
        'location',
        'price',
        'cost_info',
        'confirmation_policy',
        'refund_policy',
        'cancellation_policy',
        'payment_terms_policy',
        'image',
        'is_published',
        'is_featured',
        'is_trending',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean'
    ];

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    public function scopeTrending($query, $type = true)
    {
        return $query->where('is_trending', $type);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
