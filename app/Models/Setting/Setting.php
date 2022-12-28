<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug','title', 'value', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeFetch($query, $slug)
    {
        return $query->whereSlug($slug);
    }

    public function scopeActive($query, $type = true)
    {
        return $query->whereIsActive($type);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
