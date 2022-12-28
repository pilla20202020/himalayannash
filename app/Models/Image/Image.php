<?php

namespace App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'image_path',
        'image_name',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
