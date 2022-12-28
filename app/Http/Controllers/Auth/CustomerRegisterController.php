<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package\Package;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class CustomerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CUSTOMER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new Customer instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Customer
     */
    protected function create(array $data)
    {
        return Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $footer_tours = Package::where('is_published',1)->where('is_featured',1)->latest()->take(5)->get();

        return view('customer.auth.register',compact('footer_tours'));
    }
    public function guard()
    {
        return Auth::guard('customer');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all())->validate();

        event(new Registered($customer = $this->create($request->all())));

        $this->guard()->login($customer);

        if ($response = $this->registered($request, $customer)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $authCustomer = Customer::where('email',$user->email)->first();
            if($authCustomer)
            {
                Auth::guard('customer')->login($authCustomer);
                return redirect()->route('customer.dashboard');
            } else {
                $newCustomer = new Customer();
                $newCustomer->first_name = $user->user['given_name'];
                $newCustomer->last_name = $user->user['family_name'];

                $newCustomer->email = $user->email;
                $newCustomer->password = bcrypt('HelloWorld');
                $newCustomer->google_link = $user->email;
                // dd($newCustomer);
                $newCustomer->save();

                Auth::guard('customer')->login($authCustomer);
                return redirect()->route('customer.dashboard');
            }
            // return $user->token;
        }catch(Exception $e){
            return redirect()->route('customer.register');
        }
    }
}
