<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerFavouritePackage;
use App\Models\Image\Image;
use App\Models\Package\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function getCustomerDashBoard()
    {
        $countries = getActiveCountries();
        $customer = auth()->user();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.dashboard.index', compact('countries', 'customer','footer_tours'));
    }

    public function storeUpdateCustomerDetail(Request $request, Customer $customer)
    {
        // dd($request->all(),$customer);
        $customer->update($request->all());
        if (!empty($request->customerProfileImg)) {

            $image_name = $request->customerProfileImg->getClientOriginalName();
            if ($customer->images) {
                $image_path = storeFileOrImage($request->customerProfileImg, 'uploads/customer/profile/', $customer->images->image_path);
                $customer->images->update(['image_path' => $image_path, 'image_name' => $image_name]);
            } else {
                $image_path = storeFileOrImage($request->customerProfileImg, 'uploads/customer/profile/');
                Image::create([
                    'image_path' => $image_path,
                    'imageable_type' => Customer::class,
                    'imageable_id' => $customer->id,
                    'image_name' => $image_name
                ]);
            }
        }
        return redirect()->back()->with('message', 'Customer details updated successfully');
    }

    public function getCustomerTours()
    {
        $customer = auth()->user();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.dashboard.tours', compact('customer','footer_tours'));
    }

    public function getCustomerBooking()
    {
        $customer = auth()->user();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.dashboard.booking', compact('customer','footer_tours'));
    }

    public function getCustomerWishlist()
    {
        $customer = auth()->user();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.dashboard.wishlist', compact('customer','footer_tours'));
    }

    public function getCustomerPayments()
    {
        $customer = auth()->user();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.customer.dashboard.payment', compact('customer','footer_tours'));
    }

    public function updateCustomerWishlist(Request $request)
    {
        // dd($request->all());
        $customer = Auth::guard('customer')->user();
        $customerFavouritePackage = CustomerFavouritePackage::where('customer_id', $customer->id)
            ->where('package_id', $request->package_id)->first();
        if ($customerFavouritePackage) {
            $customerFavouritePackage->is_favourite = 1;
            if($customerFavouritePackage->save()){
                return response()->json(['status'=>true,'message'=>'Added successfully']);
            }
        } else {
            CustomerFavouritePackage::create(['customer_id' => $customer->id, 'package_id' => $request->package_id, 'is_favourite' => 1]);
            return response()->json(['status'=>true,'message'=>'Added successfully']);
        }
    }

}
