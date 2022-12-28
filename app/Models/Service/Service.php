<?php

namespace App\Models\Service;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Sluggable,HasFactory;

    protected $table = "services";

    protected $path = 'uploads/service';

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

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'content',
        'image',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
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
