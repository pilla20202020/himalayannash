<?php

namespace App\Models\Album;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Sluggable,HasFactory;

    protected $table = "albums";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name',
        'slug',
        'type',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

}
