<?php

namespace App\Http\Controllers;

use App\Models\Package\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getBookTrip()
    {   
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.booking.book-trip',compact('footer_tours'));
    }
}
