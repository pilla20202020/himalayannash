<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_code',
        'country_code',
        'country_name',
        'status'
    ];

    public static function getActiveCountries()
    {
        return self::where('status','Active')->get();
    }
}
