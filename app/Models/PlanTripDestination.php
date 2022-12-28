<?php

namespace App\Models;

use App\Models\PlanTrip;
use App\Models\Package\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTripDestination extends Model
{
    use HasFactory;

    protected $table = "plan_trip_destinations";

    protected $fillable = [
        'trip_plan_id',
        'package_id'
    ];

    public function planTrip(){
        return $this->belongsTo(PlanTrip::class,'trip_plan_id');
    }

}
