<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Models\Customer;
use App\Models\Package\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $customer_count = Customer::count();
        $places_count = Package::select('location')->distinct()->get()->count();
        $package_count = Package::count();
        $customers = Customer::latest()->take(10)->paginate(5);
        $packages = Package::latest()->take(5)->get();
        return view('backend.dashboard.index',compact('customer_count','places_count','package_count','customers','packages'));
    }
}
