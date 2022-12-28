<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login','Auth\LoginController@login');
Route::post('/admin/logout','Auth\LoginController@logout')->name('logout');

Route::group(['prefix'=>'admin','middleware'=>'is_admin'],function(){
    Route::get('dashboard','Backend\Dashboard\DashboardController@index')->name('admin.dashboard');

    Route::get('setting', 'Backend\SettingController@index')->name('setting.index');
    Route::put('setting/update', 'Backend\SettingController@update')->name('setting.update');


    // MENU/SUB-MENU/CHILD-SUB-MENU ROUTES
    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function () {
        Route::get('', 'Backend\Menu\MenuController@index')->name('index');
        Route::get('/indexnp', 'Backend\Menu\MenuController@indexnp')->name('indexnp');
        Route::post('', 'Backend\Menu\MenuController@store')->name('store');
        Route::get('{menu}/edit','Backend\Menu\MenuController@edit')->name('edit');
        Route::put('', 'Backend\Menu\MenuController@update')->name('update');
        Route::get('{menu}', 'Backend\Menu\MenuController@destroy')->name('destroy');
        Route::put('update/{id}','Backend\Menu\MenuController@updateMenu')->name('update-menu');

        Route::group(['as' => 'subMenu.'], function () {
            Route::post('{menu}/subMenu', 'Backend\Menu\MenuController@storeSubMenu')->name('store');
            Route::get('{menu}/subMenu/{subMenu}/edit', 'Backend\Menu\MenuController@editSubMenu')->name('edit');
            Route::put('subMenu/{id}', 'Backend\Menu\MenuController@updateSubMenu')->name('update');
            Route::get('{menu}/subMenu/{subMenu}', 'Backend\Menu\MenuController@destroySubMenu')->name('destroy');
            Route::get('{menu}/subMenuModal', 'Backend\Menu\MenuController@subMenuModal')->name('component.modal');

            Route::group(['as' => 'childsubMenu.'], function () {
                Route::post('{subMenu}/subMenu/childsubMenu', 'Backend\Menu\MenuController@storeChildSubMenu')->name('store');
                Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}/edit', 'Backend\Menu\MenuController@editChildSubMenu')->name('edit');
                Route::put('childSubMenu/{id}', 'Backend\Menu\MenuController@updateChildSubMenu')->name('update');
                Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}', 'Backend\Menu\MenuController@destroyChildSubMenu')->name('destroy');
                Route::get('{subMenu}/childsubMenuModal', 'Backend\Menu\MenuController@childsubMenuModal')->name('component.childmodal');
            });
        });
    });

    Route::group(['as' => 'page.', 'prefix' => 'page'], function () {
        Route::get('', 'Backend\Page\PageController@index')->name('index');
        Route::get('create', 'Backend\Page\PageController@create')->name('create');
        Route::post('', 'Backend\Page\PageController@store')->name('store');
        Route::get('{page}/edit', 'Backend\Page\PageController@edit')->name('edit');
        Route::put('{page}', 'Backend\Page\PageController@update')->name('update');
        Route::get('{id}', 'Backend\Page\PageController@destroy')->name('destroy');
    });

    Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
        Route::get('', 'Backend\Blog\BlogController@index')->name('index');
        Route::get('create', 'Backend\Blog\BlogController@create')->name('create');
        Route::post('', 'Backend\Blog\BlogController@store')->name('store');
        Route::get('{blog}/edit', 'Backend\Blog\BlogController@edit')->name('edit');
        Route::put('{blog}', 'Backend\Blog\BlogController@update')->name('update');
        Route::get('{id}', 'Backend\Blog\BlogController@destroy')->name('destroy');
    });

    Route::group(['as' => 'service.', 'prefix' => 'service'], function () {
        Route::get('', 'Backend\Service\ServiceController@index')->name('index');
        Route::get('create', 'Backend\Service\ServiceController@create')->name('create');
        Route::post('', 'Backend\Service\ServiceController@store')->name('store');
        Route::get('{service}/edit', 'Backend\Service\ServiceController@edit')->name('edit');
        Route::put('{service}', 'Backend\Service\ServiceController@update')->name('update');
        Route::get('{id}', 'Backend\Service\ServiceController@destroy')->name('destroy');
    });

    Route::group(['as' => 'testimonials.', 'prefix' => 'testimonials'], function () {
        Route::get('', 'Backend\Testimonial\TestimonialController@index')->name('index');
        Route::get('create', 'Backend\Testimonial\TestimonialController@create')->name('create');
        Route::post('', 'Backend\Testimonial\TestimonialController@store')->name('store');
        Route::get('{id}/edit', 'Backend\Testimonial\TestimonialController@edit')->name('edit');
        Route::put('{id}', 'Backend\Testimonial\TestimonialController@update')->name('update');
        Route::get('{id}', 'Backend\Testimonial\TestimonialController@destroy')->name('destroy');
    });

    Route::group(['as' => 'videos.', 'prefix' => 'video'], function () {
        Route::get('', 'Backend\Video\VideoController@index')->name('index');
        Route::get('create', 'Backend\Video\VideoController@create')->name('create');
        Route::post('', 'Backend\Video\VideoController@store')->name('store');
        Route::get('{id}/edit', 'Backend\Video\VideoController@edit')->name('edit');
        Route::put('{id}', 'Backend\Video\VideoController@update')->name('update');
        Route::get('{id}', 'Backend\Video\VideoController@destroy')->name('destroy');
    });

    Route::group(['as' => 'categories.', 'prefix' => 'category'], function () {
        Route::get('', 'Backend\Category\CategoryController@index')->name('index');
        Route::get('create', 'Backend\Category\CategoryController@create')->name('create');
        Route::post('', 'Backend\Category\CategoryController@store')->name('store');
        Route::get('{id}/edit', 'Backend\Category\CategoryController@edit')->name('edit');
        Route::put('{id}', 'Backend\Category\CategoryController@update')->name('update');
        Route::get('{id}', 'Backend\Category\CategoryController@destroy')->name('destroy');
    });

    Route::group(['as' => 'subcategories.', 'prefix' => 'subcategory'], function () {
        Route::get('', 'Backend\Category\SubCategoryController@index')->name('index');
        Route::get('create', 'Backend\Category\SubCategoryController@create')->name('create');
        Route::post('', 'Backend\Category\SubCategoryController@store')->name('store');
        Route::get('{id}/edit', 'Backend\Category\SubCategoryController@edit')->name('edit');
        Route::put('{id}', 'Backend\Category\SubCategoryController@update')->name('update');
        Route::get('{id}', 'Backend\Category\SubCategoryController@destroy')->name('destroy');
    });

    Route::group(['as' => 'albums.', 'prefix' => 'album'], function () {
        Route::get('', 'Backend\Album\AlbumController@index')->name('index');
        Route::get('create', 'Backend\Album\AlbumController@create')->name('create');
        Route::get('get-subcategory', 'Backend\Album\AlbumController@getSubCategory')->name('get_sub_category');
        Route::post('', 'Backend\Album\AlbumController@store')->name('store');
        Route::get('{album}/edit', 'Backend\Album\AlbumController@edit')->name('edit');
        Route::put('{album}', 'Backend\Album\AlbumController@update')->name('update');
        Route::get('{id}', 'Backend\Album\AlbumController@destroy')->name('destroy');
    });

    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('', 'Backend\Slider\SliderController@index')->name('index');
        Route::get('create', 'Backend\Slider\SliderController@create')->name('create');
        // Route::get('get-subcategory', 'Backend\Slider\SliderController@getSubCategory')->name('get_sub_category');
        Route::post('', 'Backend\Slider\SliderController@store')->name('store');
        Route::get('{id}/edit', 'Backend\Slider\SliderController@edit')->name('edit');
        Route::put('{id}', 'Backend\Slider\SliderController@update')->name('update');
        Route::get('{id}', 'Backend\Slider\SliderController@destroy')->name('destroy');
    });

    Route::group(['as' => 'package.', 'prefix' => 'package'], function () {
        Route::get('', 'Backend\Package\PackageController@index')->name('index');
        Route::get('create', 'Backend\Package\PackageController@create')->name('create');
        Route::get('get-subcategory', 'Backend\Package\PackageController@getSubCategory')->name('get_sub_category');
        Route::post('', 'Backend\Package\PackageController@store')->name('store');
        Route::get('{package}/edit', 'Backend\Package\PackageController@edit')->name('edit');
        Route::put('{package}', 'Backend\Package\PackageController@update')->name('update');
        Route::get('{id}', 'Backend\Package\PackageController@destroy')->name('destroy');
    });

    Route::group(['as'=>'inquiry.','prefix'=>'inquiry'], function(){
        Route::get('','Backend\Package\PackageInquiryController@index')->name('index');
        Route::get('show/{id}','Backend\Package\PackageInquiryController@show')->name('show');
        Route::get('{id}','Backend\Package\PackageInquiryController@destroy')->name('delete');
    });

    Route::group(['as'=>'customer-trip-plan.','prefix'=>'customer-trip-plan'],function(){
        Route::get('','Backend\Trip\TripPlanController@index')->name('index');
        Route::get('customer-trip-plan/{id}','Backend\Trip\TripPlanController@show')->name('show');
    });

    Route::group(['as'=>'customer.','prefix'=>'customer'],function(){
        Route::get('','Backend\Customer\CustomerDetailController@index')->name('index');
        Route::get('{id}/show','Backend\Customer\CustomerDetailController@show')->name('show');
    });

});




