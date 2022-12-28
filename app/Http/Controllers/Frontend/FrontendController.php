<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page\Page;
use App\Models\Blog\Blog;
use App\Models\Slider\Slider;
use App\Models\Testimonial\Testimonial;
use App\Models\Video\Video;
use App\Models\Package\Package;
use App\Models\Package\Itinerary;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Image\Image;
use App\Mail\ContactUs;
use App\Mail\PackageInquiryMail;
use App\Models\Customer\PackageEnquiry;
use App\Models\CustomerFavouritePackage;
use App\Models\PlanTrip;
use App\Models\PlanTripDestination;
use App\Mail\TripPlanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{

    public function homepage()
    {
        $about = Page::where('slug','about-us')->first();
        $sliders = Slider::where('album_id',1)->where('is_published',1)->where('is_featured',1)->inRandomOrder()->get();
        $about_sliders = Slider::where('album_id',2)->where('is_published',1)->where('is_featured',1)->inRandomOrder()->get();
        $blogs = Blog::where('is_published',1)->where('is_featured',1)->latest()->take(3)->get();
        $testimonials = Testimonial::where('is_published',1)->where('is_featured',1)->latest()->get();
        $video = Video::where('is_published',1)->latest()->first();
        $treks = Package::where('category_id',2)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $trending_places = Package::where('is_trending',1)->where('is_published',1)->latest()->get();
        $categories = Category::where('is_published',1)->latest()->get();
        $expeditions = Package::where('category_id',1)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $rafting = Package::where('category_id',7)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $religious_tours = Package::where('category_id',5)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $cultural_tours = Package::where('category_id',3)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $nature_tours = Package::where('category_id',4)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $cycling_tours = Package::where('category_id',6)->where('is_published',1)->where('is_featured',1)->latest()->get();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        // dd($categories);
        $customerFavPackages = [];
        if(Auth::guard('customer')->user()){
            $customerFavPackages = CustomerFavouritePackage::select('package_id')->where('customer_id',Auth::guard('customer')->user()->id)->get()->pluck('package_id')->toArray();
            // dd($customerFavPackages);
        }
        return view('frontend.homepage',compact('about','blogs','testimonials','video','treks','trending_places','categories','customerFavPackages','sliders','about_sliders','expeditions','rafting','religious_tours','cultural_tours','nature_tours','cycling_tours','footer_tours'));
    }

    public function packageSearch(Request $request) {
        $filters = [
            'days' => explode(',', $request->duration),
            'categories_id'    => $request->categories,
        ];

        $package = Package::where(function ($query) use ($filters){
            if ($filters['days']) {
                $query->whereBetween('no_of_days', $filters['days']);
            }

            if ($filters['categories_id']) {
                $query->whereIn('category_id', $filters['categories_id']);
            }
        })->get();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        return view('frontend.tourfilter',compact('package','footer_tours'));
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        if(isset($request->keyword) && !empty($request->keyword)){
            $packages = Package::where('name','LIKE',"%".$keyword."%")
                        ->orWhere('summary','LIKE',"%".$keyword."%")
                        ->orWhere('overview','LIKE',"%".$keyword."%")->get();

            $blogs = Blog::where('title','LIKE',"%".$keyword."%")
                        ->orWhere('meta_description','LIKE',"%".$keyword."%")
                        ->orWhere('content','LIKE',"%".$keyword."%")->get();
        }
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.search',compact('packages','blogs','footer_tours'));
    }

    public function blog()
    {
        $blogs = Blog::where('is_published',1)->latest()->paginate(6);
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.blog.index',compact('blogs','footer_tours'));
    }

    public function packageDetail($slug)
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        if($package = Package::where('slug', $slug)->first()){
            $itineraries = Itinerary::where('package_id',$package->id)->get();
            $images = Image::where('imageable_type',Package::class)->where('imageable_id',$package->id)->get();
            $similar_tours = Package::where('is_published',1)->where('is_featured',1)->whereIn('category_id',[$package->category_id])->whereNotIn('id',[$package->id])->latest()->take(5)->get();
            $popular_tours = Package::where('is_published',1)->where('is_trending',1)->where('is_featured',1)->whereNotIn('id',[$package->id])->latest()->take(5)->get();
            $recent_blogs = Blog::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

            return view('frontend.package.detail',compact('package','itineraries','images','similar_tours','popular_tours','recent_blogs','footer_tours'));
        }
        else {
            return view('errors.404',compact('footer_tours'));
        }
    }

    public function sendPackageEnquiry(Request $request)
    {
        $input = $request->all();
        $inquiry = PackageEnquiry::create($input);
        // dd($inquiry->package->name);
        $data = [
            'name' => $inquiry->first_name . ' ' . $inquiry->last_name,
            'email' => $inquiry->email,
            'contact_no' => $inquiry->contact_no,
            'package_name' => $inquiry->package->name,
            'message'=>$inquiry->message
        ];
        Mail::to('aayushniraula1@gmail.com')->send(new PackageInquiryMail($data));
        Toastr()->success('Your inquiry has been sent successfully!','Success');
        return redirect()->back();
    }

    public function blogDetail($slug)
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        if($blog = Blog::where('slug', $slug)->first()){
            $recent_blogs = Blog::where('is_published',1)->where('is_featured',1)->whereNotIn('id',[$blog->id])->latest()->take(4)->get();

            return view('frontend.blog.detail',compact('blog','recent_blogs','footer_tours'));
        }
        else {
            return view('errors.404',compact('footer_tours'));
        }
    }

    public function contact()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.contact.index',compact('footer_tours'));
    }

    public function sendEnquiry(Request $request)
    {
        $data = $request->all();
        Mail::to('aayushniraula1@gmail.com')->send(new ContactUs($data));
        Toastr()->success('Your inquiry has been sent successfully!','Success');
        return redirect()->back();
    }

    public function allTours()
    {
        $tours = Package::where('is_published',1)->get();
        $categories = Category::where('is_published',1)->get();
        $packages = Package::where('is_published',1)->get();
        $customerFavPackages = [];
        if(Auth::guard('customer')->user()){
            $customerFavPackages = CustomerFavouritePackage::select('package_id')->where('customer_id',Auth::guard('customer')->user()->id)->get()->pluck('package_id')->toArray();
            // dd($customerFavPackages);
        }
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.tour.index',compact('tours','categories','packages','customerFavPackages','footer_tours'));
    }

    public function filterPackage(Request $request)
    {
        $data = $request->all();
        // DB::enableQueryLog();
        // dd($data);
        $packages = Package::where(function($query) use ($data){
            if(!empty($data['category_ids']))
            {
                $query->whereIn('category_id',$data['category_ids']);
            }
            if(!empty($data['min_price']) && $data['max_price'])
            {
                $query->whereBetween('price', [$data['min_price'],$data['max_price']]);
            }
            if(!empty($data['criteria']))
            {
                if($data['criteria'] == 'Latest')
                {
                    $query->latest();
                } else if($data['criteria'] == 'Famous'){
                    $query->where('is_trending',1);
                } else if($data['criteria'] == 'All'){
                    $query;
                }else{
                    $query->where('name','LIKE',"%".$data['criteria']."%")->orWhere('location','LIKE',"%".$data['criteria']."%");
                }
            }

        })->get();
        // dd($packages);
        // dd(DB::getQueryLog());
        return response()->json(['status'=>200, 'message'=>$packages]);
    }

    public function getPriceRange(Request $request)
    {
        $min_price = Package::select('price')->where('is_published',1)->min('price');
        $max_price = Package::select('price')->where('is_published',1)->max('price');
        return response()->json(['min'=>$min_price, 'max'=>$max_price]);
    }

    public function planTrip()
    {
        $packages = Package::where('is_published',1)->where('is_featured',1)->get();
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.trip.plan',compact('packages','footer_tours'));
    }

    public function planTripStore(Request $request)
    {
        $input = [
            'travel_with' => $request->travel_with,
            'no_of_adult' => $request->no_of_adult,
            'no_of_children' => $request->no_of_children,
            'travel_when' => $request->travel_when,
            'arrival_date' => $request->arrival_date,
            'departure_date' => $request->departure_date,
            'month_approx' => $request->month_approx,
            'min_budget' => $request->min_budget,
            'max_budget' => $request->max_budget,
            'accomodation' => $request->accomodation,
            'is_budget_flexible' => $request->is_budget_flexible,
            'contact_no' => $request->contact_no,
            'contact_no_alternate' => $request->contact_no_alternate,
            'email' => $request->email,
            'nationality' => $request->nationality,
            'method_of_contact' => $request->method_of_contact,
            'is_policy_read' => ($request->is_policy_read ? $request->is_policy_read : 'No') ,
            'desired_trip' => $request->desired_trip,
            'trip_planning' => $request->trip_planning,
            'country' => $request->country,
            'message' => $request->message,
        ];
        $plan_trip = PlanTrip::create($input);

        $packages = $request->package_id;
        // dd($package_id);
        foreach($packages as $key => $value)
        {
            $trip_type = [
                'trip_plan_id' => $plan_trip->id,
                'package_id' => $value,
            ];

            // dd($trip_type);
            PlanTripDestination::create($trip_type);
        }
        Mail::to('aayushniraula1@gmail.com')->send(new TripPlanMail($input));
        return response()->json(['status'=>200,'message'=>"Trip plan has been submitted successfully"]);
    }

    public function bookThisTrip(Package $package)
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('frontend.trip.book',compact('package','footer_tours'));
    }

    public function exploreExpedition()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $expeditions = Package::where('category_id',1)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.expedition',compact('footer_tours','expeditions'));
    }

    public function exploreTrek()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $treks = Package::where('category_id',2)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.trek_hike',compact('footer_tours','treks'));
    }

    public function exploreCulturalHistorical()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $tours = Package::where('category_id',3)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.cultural_historical',compact('footer_tours','tours'));
    }

    public function exploreNatureWildlife()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $tours = Package::where('category_id',4)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.nature_wildlife',compact('footer_tours','tours'));
    }


    public function exploreReligion()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $tours = Package::where('category_id',5)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.religious',compact('footer_tours','tours'));
    }

    public function exploreCycling()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $tours = Package::where('category_id',6)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.cycling',compact('footer_tours','tours'));
    }

    public function exploreRafting()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
        $tours = Package::where('category_id',7)->where('is_published',1)->latest()->paginate(5);
        return view('frontend.explore.rafting',compact('footer_tours','tours'));
    }



    public function page($slug = null)
    {

        if ($slug) {
            $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

            $page = Page::whereSlug($slug)->whereIsPublished(1)->first();

            if ($page == null) {
                return view('errors.404',compact('footer_tours'));
            }

            if ($page) {
                $pages = Page::whereIsPublished(1)->whereIsPrimary(0)->whereNotIn('id', [$page->id])->take(10)->inRandomOrder()->get();
                $popular_tours = Package::where('is_published',1)->where('is_trending',1)->take(5)->latest()->get();
                $recent_blogs = Blog::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();
                if ($pages) {
                    return view('frontend.page', compact('page', 'pages','popular_tours','recent_blogs','footer_tours'));
                }
            } else {
                return view('errors.404',compact('footer_tours'));
            }
        }
    }
}
