<?php

namespace App\Models\Category;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = "sub_categories";

    protected $fillable = [
        'category_id',
        'name',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
