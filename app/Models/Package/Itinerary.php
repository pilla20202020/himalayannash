<?php

namespace App\Models\Package;

use App\Models\Package\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $table = "itineraries";

    protected $fillable = [
        'package_id',
        'title',
        'day',
        'description',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}
