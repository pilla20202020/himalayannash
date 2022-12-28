<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = "videos";
    
    protected $path ='uploads/video'; 

    protected $fillable = [
        'title',
        'caption',
        'video',
        'has_link',
        'video_link',
        'is_published'
    ];

    protected $appends = [
        'video_path'
    ];

    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    function getVideoPathAttribute(){
        return $this->path.'/'. $this->video;
    }

}
