<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable,HasFactory;

    protected $table = "blogs";

    protected $path = 'uploads/blog';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];

    protected $dates = ['created_at'];

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'content',
        'image',
        'has_link',
        'link',
        'is_published',
        'is_featured',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

}
