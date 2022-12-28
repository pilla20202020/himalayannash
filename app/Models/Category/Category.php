<?php

namespace App\Models\Category;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use Sluggable,HasFactory;

    protected $table = 'categories';

    protected $path = 'uploads/category';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = ['name','slug','image','is_published'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
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
