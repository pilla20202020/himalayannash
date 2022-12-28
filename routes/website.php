<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::group(['middleware' => 'guest:customer'], function () {

    Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@processLogin')->name('customer.login');
    Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
    Route::post('/register', 'Auth\CustomerRegisterController@register')->name('customer.register');
});

Route::get('/login/google', 'Auth\CustomerRegisterController@redirectToProvider')->name('google.login');
Route::get('/login/google/callback', 'Auth\CustomerRegisterController@handleProviderCallback');

// Route::get('/auth/google', function () {
//     return Socialite::driver('google')->redirect();
// })->name('google.login');
 
// Route::get('/login/google/callback', function () {
//     $user = Socialite::driver('google')->user();

//     dd($user);
//     // $user->token
// });

Route::group([ 'middleware' => 'auth:customer'], function () {
    Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
    Route::get('/dashboard', 'Frontend\CustomerController@getCustomerDashBoard')->name('customer.dashboard');
    Route::post('/details/{customer}', 'Frontend\CustomerController@storeUpdateCustomerDetail')->name('customer.detail');
    Route::get('/tours', 'Frontend\CustomerController@getCustomerTours')->name('customer.tours');
    Route::get('/booking', 'Frontend\CustomerController@getCustomerBooking')->name('customer.booking');
    Route::get('/wishlist', 'Frontend\CustomerController@getCustomerWishlist')->name('customer.wishlist');
    Route::get('/payments', 'Frontend\CustomerController@getCustomerPayments')->name('customer.payments');

    
    Route::get('/book-trip', 'BookingController@getBookTrip')->name('customer.book.trip');


    //Routing For Ajax
    Route::post('/update/wishlist', 'Frontend\CustomerController@updateCustomerWishlist')->name('customer.updat.wishlist');
    //End of Ajax Routing

});


Route::get('', 'Frontend\FrontendController@homepage')->name('homepage');
Route::get('listings/package/search', 'Frontend\FrontendController@packageSearch')->name('package_search');
Route::get('all/search', 'Frontend\FrontendController@search')->name('search');
Route::get('price-range', 'Frontend\FrontendController@getPriceRange')->name('get.price_range');
Route::post('package/filter', 'Frontend\FrontendController@filterPackage')->name('package.filter');
Route::get('blog','Frontend\FrontendController@blog')->name('blogs');
Route::get('blog/read-blog/{blog}','Frontend\FrontendController@blogDetail')->name('blog.details');
Route::get('package-detail/{package}','Frontend\FrontendController@packageDetail')->name('package_details');
Route::get('contact','Frontend\FrontendController@contact')->name('contact_us');
Route::post('send-enquiry','Frontend\FrontendController@sendEnquiry')->name('send_enquiry');
Route::post('send-package-enquiry','Frontend\FrontendController@sendPackageEnquiry')->name('package.send_enquiry');
Route::get('all-tour','Frontend\FrontendController@allTours')->name('all_tours');
Route::get('planning-a-trip-with-himalayan-nash','Frontend\FrontendController@planTrip')->name('plan_trips');
Route::get('book-trip/{package}','Frontend\FrontendController@bookThisTrip')->name('book.this_trip');
Route::post('plan-trip','Frontend\FrontendController@planTripStore')->name('plan_trip.store');
Route::get('explore-expeditions-and-peak-climbing-in-nepal','Frontend\FrontendController@exploreExpedition')->name('explore.expeditions');
Route::get('explore-trekking-and-hiking-in-nepal','Frontend\FrontendController@exploreTrek')->name('explore.treks');
Route::get('explore-cultural-and-historical-tours-in-nepal','Frontend\FrontendController@exploreCulturalHistorical')->name('explore.cultural_historical');
Route::get('explore-nature-and-wildlife-in-nepal','Frontend\FrontendController@exploreNatureWildlife')->name('explore.nature_wildlife');
Route::get('explore-spiritual-and-religious-tour-in-nepal','Frontend\FrontendController@exploreReligion')->name('explore.religions');
Route::get('explore-cycling-and-mountain-biking-in-nepal','Frontend\FrontendController@exploreCycling')->name('explore.cycling');
Route::get('explore-river-rafting-in-nepal','Frontend\FrontendController@exploreRafting')->name('explore.rafting');
Route::get('{page}', 'Frontend\FrontendController@page')->name('page.detail');
 