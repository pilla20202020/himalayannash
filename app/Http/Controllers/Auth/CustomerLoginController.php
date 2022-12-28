<?php

namespace App\Http\Controllers\Auth;

use App\Models\Package\Package;
use App\Http\Controllers\Controller;
use App\Models\CustomerFavouritePackage;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {   
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('customer.auth.login',compact('footer_tours'));
    }

    public function logout(Request $request)
    {
        // $this->guard()->logout();

        // $request->session()->invalidate();

        // return $this->loggedOut($request) ?: redirect('/');

        Auth::guard('customer')->logout();
        return redirect()->action([
            CustomerLoginController::class,
            'showLoginForm'
        ]);
    }

    public function processLogin(Request $request)
    {

        $credentials = $request->except(['_token']);
        
        if ($request->ajax()) {
            if (isCustomerActive($request->email)) {
                if (!Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json([
                        'status' => false,
                        'message' => 'You are not an active customers!',
                    ]);
                }
                // dd(auth()->user());
                //if Authentication is successfull
                $customer = Auth::guard('customer')->user();
                $customerFavouritePackage = CustomerFavouritePackage::where('customer_id', $customer->id)
                    ->where('package_id', $request->package_id)->first();
                if ($customerFavouritePackage) {
                    $customerFavouritePackage->is_favourite = 1;
                    $customerFavouritePackage->save();
                } else {
                    CustomerFavouritePackage::create(['customer_id' => $customer->id, 'package_id' => $request->package_id, 'is_favourite' => 1]);
                }
                return response()->json([
                    'status' => true,
                    'message' => '',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Credentials not matced in our records!',
                ]);
            }
        }


        if (isCustomerActive($request->email)) {
            if (!Auth::guard('customer')->attempt($credentials)) {
                return redirect()->action([
                    CustomerLoginController::class,
                    'showLoginForm'
                ])->with('message', 'You are not an active customers!');
            }
            return redirect(RouteServiceProvider::CUSTOMER);
        } else {
            return redirect()->action([
                CustomerLoginController::class,
                'showLoginForm'
            ])->with('message', 'Credentials not matced in our records!');
        }
    }
}
