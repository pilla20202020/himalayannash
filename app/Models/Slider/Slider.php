<?php

namespace App\Models\Slider;

use App\Models\Album\Album;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = "sliders";

    protected $path = 'uploads/slider';

    protected $appends = [
        'thumbnail_path', 'image_path'
    ];

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    public function scopeFeatured($query, $type = true)
    {
        return $query->where('is_featured', $type);
    }

    protected $fillable = [
        'title',
        'caption',
        'album_id',
        'image',
        'is_published',
        'is_featured',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean'
    ];

    function getImagePathAttribute()
    {
        return $this->path . '/' . $this->image;
    }

    function getThumbnailPathAttribute()
    {
        return $this->path . '/thumb/' . $this->image;
    }

    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }

}
