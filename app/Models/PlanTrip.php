<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTrip extends Model
{
    use HasFactory;

    protected $table = "plan_trips";

    protected $fillable = [
        'travel_with',
        'no_of_adult',
        'no_of_children',
        'travel_when',
        'arrival_date',
        'departure_date',
        'month_approx',
        'accomodation',
        'min_budget',
        'max_budget',
        'is_budget_flexible',
        'contact_no',
        'contact_no_alternate',
        'email',
        'nationality',
        'method_of_contact',
        'is_policy_read',
        'desired_trip',
        'trip_planning',
        'message',
        'country',
    ];
}
