<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFavouritePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','package_id','is_favourite'
    ];
}
