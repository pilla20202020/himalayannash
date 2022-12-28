<?php

namespace App\Models;

use App\Models\Image\Image;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_no',
        'email',
        'address',
        'city',
        'postal_code',
        'country_id',
        'facebook_link',
        'google_link',
        'twitter_link',
        'pinterest_link',
        'about_me',
        'password',
        'is_active',
        'social_unique_id',
        'login_by'
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }
    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
