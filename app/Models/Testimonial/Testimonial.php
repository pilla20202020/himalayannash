<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = "testimonials";

    protected $path = 'uploads/testimonial';

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];

    protected $fillable = [
        'name',
        'review',
        'customer_rating',
        'image',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
    ];

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
