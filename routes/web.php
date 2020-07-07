<?php

use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Service\ServicePropertyController;
use App\Libraries\Utilities\BuiltInMethods;
use App\Libraries\Utilities\TrackerUtility;
use App\Libraries\Utilities\TypeUtility;
use App\ServiceType;
use App\UserProperty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use PragmaRX\Tracker\Vendor\Laravel\Facade as Tracker;


Route::get('city_tours/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return view("temp.city_tours.pages.confirmation_hotel") ;
});



Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
//    app()->setLocale($locale);
    return redirect()->back();
});

Route::get('/out', function () {
    Auth::logout();
});


//**********AUTH
Route::get('/register/{type}', 'CustomAuth\AuthController@registrationForm')->name('auth.register.form');
Route::post('/register/{type}', 'CustomAuth\AuthController@registerUser')->name('auth.register');;
Route::get('/login/{type}', 'CustomAuth\AuthController@loginForm')->name('auth.login.form');
Route::post('/login/{type}', 'CustomAuth\AuthController@login')->name('auth.login');
Route::get('/logout', 'CustomAuth\AuthController@logout')->name('auth.logout');
//**********AUTH

Route::get('/', 'HomeController@index')->name('home.index');
//Route::get('/home', 'HomeController@index2')->name('home.index2');
Route::any('/services/resume/{type}/{step?}/{refer?}', 'Service\ServiceController@resumeService')->name('home.services.resume');
Route::any('/services/{type}/{step?}/{refer?}', 'Service\ServiceController@launchService')->name('home.services.launch');

Route::get('/rooms', 'HomeController@showRooms')->name('home.room.all');
Route::get('/rooms/{id}', 'HomeController@showRoom')->name('home.room.show');

Route::get('/news', 'HomeController@showNewses')->name('home.news.all');
Route::get('/news/{id}', 'HomeController@showNews')->name('home.news.show');

Route::get('/galleries', 'HomeController@showGalleries')->name('home.gallery.all');
Route::get('/galleries/{id}', 'HomeController@showGallery')->name('home.gallery.show');

Route::get('/complaints', 'HomeController@sendComplaint')->name('home.complaint');
Route::post('/complaints', 'HomeController@sendComplaint')->name('home.complaint');

Route::get('/contact', 'HomeController@sendContact')->name('home.contact');
Route::post('/contact', 'HomeController@sendContact')->name('home.contact');

Route::get('/faq', 'HomeController@faq')->name('home.faq');
Route::get('/about', 'HomeController@about')->name('home.about');


Route::get('/cart', 'HomeController@cart')->name('home.cart');
Route::get('/checkout', 'HomeController@checkout')->name('home.checkout');
Route::get('/confirmation', 'HomeController@confirmation')->name('home.confirmation');

Route::get('/page/{id}', 'HomeController@showPage')->name('home.page.show');


Route::get('/booking/start/{room}', 'HomeController@startBooking')->name('home.booking.start');


Route::post('/booking/update/price/{type}', 'HomeController@updatePrices')->name("home.booking.update.price");




Route::post('/booking/save/{room}', 'HomeController@saveBooking')->name('home.booking.save');
Route::get('/booking/confirm/{code}', 'HomeController@confirmBooking')->name('home.booking.confirm');
Route::post('/booking/check/room_verification', 'HomeController@checkRoomVerification')->name('home.booking.check.room');


//Route::get('/booking/payout/{code?}', 'HomeController@payoutBooking')->name('home.booking.payout');

Route::get('/booking/bank/{code?}', 'HomeController@payout')->name('home.booking.to.bank');


Route::any('/booking/returnFromBank/{code?}', 'HomeController@returnFromBank')->name('home.return.from.bank');


Route::get('/booking/finish/{code}', 'HomeController@finishBooking')->name('home.booking.finish');


Route::get('/customer/login', 'HomeController@showLoginPage')->name('home.customer.login');
Route::get('/customer/register', 'HomeController@showRegisterPage')->name('home.customer.register');
Route::get('/customer/history', 'HomeController@showHistory')->name('home.customer.history');


Route::get('/documents/ajax/voucher/{code?}', 'HomeController@printVoucher')->name('home.voucher.print');
//Route::get('/services/payout/{code?}', 'HomeController@payout')->name('home.payout');


Route::middleware(['auth', 'authAdmin'])->group(function () {

    Route::get('/generate-sitemap', function () {
        SitemapGenerator::create(url("/"))->
        writeToFile(public_path('sitemap.xml'));
        return response()->json(['error' => false, 'path' => url("/sitemap.xml")]);
    })->name('generate-sitemap');

    //***************ADMIN**********************
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    /////////////***************ADMIN**********************

    //***************ITEM**********************
    //PROPERTY
    Route::get('/admin/items/{type}/properties', 'Item\ItemPropertyController@index')->name('items.properties.index');
    Route::get('/admin/items/{type}/properties/{id}', 'Item\ItemPropertyController@show')->name('items.properties.show')->where('id', '[0-9]+');
    Route::get('/admin/items/{type}/properties/create', 'Item\ItemPropertyController@create')->name('items.properties.create');
    Route::post('/admin/items/{type}/properties/store', 'Item\ItemPropertyController@store')->name('items.properties.store');
    Route::get('/admin/items/{type}/properties/{id}/edit', 'Item\ItemPropertyController@edit')->name('items.properties.edit');
    Route::post('/admin/items/{type}/properties/{id}/update', 'Item\ItemPropertyController@update')->name('items.properties.update');
    Route::post('/admin/items/{type}/properties/{id}/destroy', 'Item\ItemPropertyController@destroy')->name('items.properties.destroy');
    Route::post('/admin/ajax/items/{type}/properties/destroy', 'Item\ItemPropertyController@destroy_property')->name('items.properties.ajax.destroy');
    //SETTING
    Route::get('/admin/items/{type}/settings', 'Item\ItemPropertyController@settings')->name('items.settings.edit');
    Route::post('/admin/items/{type}/settings/update', 'Item\ItemPropertyController@updateSettings')->name('items.settings.update');
    //ITEM

    Route::get('/admin/items/{type}/create', 'Item\ItemController@create')->name('items.create');
    Route::get('/admin/items/{type}/{id}/edit', 'Item\ItemController@edit')->name('items.edit')->where('id', '[0-9]+');
    Route::get('/admin/items/{type}/{id}', 'Item\ItemController@show')->name('items.show')->where('id', '[0-9]+');


    Route::post('/admin/items/{type}/ajax', 'Item\ItemController@get')->name('items.ajax.get')->where('id', '[0-9]+');

    Route::get('/admin/items/{type}/{filters?}', 'Item\ItemController@index')->name('items.index')->where('filters', '^(?!properties)$');
    Route::post('/admin/items/{type}/store', 'Item\ItemController@store')->name('items.store');
    Route::post('/admin/items/{type}/{id}/update', 'Item\ItemController@update')->name('items.update')->where('id', '[0-9]+');
    Route::post('/admin/items/{type}/ajax/destroy', 'Item\ItemController@destroy')->name('items.destroy');
    Route::post('/admin/items/{type}/change', 'Item\ItemController@changeProperty')->name('items.change');
    Route::post('/admin/items/{type}/{property}/set', 'Item\ItemController@setProperty')->name('items.set.property');
    Route::post('/admin/items/{type}/{property}/get', 'Item\ItemController@getProperty')->name('items.get.property');


    /////////////***************ITEM**********************

    //***************USERS**********************

//    //PROPERTY
//    Route::get('/admin/users/{type}/properties', 'User\UserPropertyController@index')->name('users.properties.index');
//    Route::get('/admin/users/{type}/properties/{id}', 'User\UserPropertyController@show')->name('users.properties.show')->where('id', '[0-9]+');
//    Route::get('/admin/users/{type}/properties/create', 'User\UserPropertyController@create')->name('users.properties.create');
//    Route::get('/admin/users/{type}/properties/{id}/edit', 'User\UserPropertyController@edit')->name('users.properties.edit');
//    Route::post('/admin/users/{type}/properties/store', 'User\UserPropertyController@store')->name('users.properties.store');
//    Route::post('/admin/users/{type}/properties/{id}/update', 'User\UserPropertyController@update')->name('users.properties.update');
//    Route::post('/admin/users/{type}/properties/{id}/destroy', 'User\UserPropertyController@destroy')->name('users.properties.destroy');
//    Route::post('/admin/ajax/users/{type}/properties/destroy', 'User\UserPropertyController@destroy_property')->name('users.properties.ajax.destroy');
//
//    //SETTING
//    Route::get('/admin/users/{type}/settings', 'User\UserPropertyController@settings')->name('users.settings.edit');
//    Route::post('/admin/users/{type}/settings/update', 'User\UserPropertyController@updateSettings')->name('users.settings.update');
//
//    //ITEM
//    Route::get('/admin/users/{type}/create', 'User\UserController@create')->name('users.create');
//    Route::get('/admin/users/{type}/{id}/edit', 'User\UserController@edit')->name('users.edit')->where('id', '[0-9]+');
//    Route::get('/admin/users/{type}/{id}', 'User\UserController@show')->name('users.show')->where('id', '[0-9]+');
//    Route::get('/admin/users/{type}/{filters?}', 'User\UserController@index')->name('users.index')->where('filters', '^(?!properties)$');
//    Route::post('/admin/users/{type}/store', 'User\UserController@store')->name('users.store');
//    Route::post('/admin/users/{type}/{id}/update', 'User\UserController@update')->name('users.update')->where('id', '[0-9]+');
//    Route::post('/admin/users/{type}/ajax/destroy', 'User\UserController@destroy')->name('users.destroy');
//    Route::post('/admin/users/{type}/change', 'User\UserController@changeProperty')->name('users.change');


    /////////////***************USERS**********************

    //***************NAVIGATION**********************


    Route::get('/admin/navigation', 'Navigation\NavigationController@index')->name('navigation.index');
    Route::get('/admin/navigation/{id}', 'Navigation\NavigationController@show')->name('navigation.show')->where('id', '[0-9]+');
    Route::get('/admin/navigation/create', 'Navigation\NavigationController@create')->name('navigation.create');
    Route::post('/admin/navigation/store', 'Navigation\NavigationController@store')->name('navigation.store');
    Route::post('/admin/navigation/destroy', 'Navigation\NavigationController@destroy')->name('navigation.destroy');
    Route::post('/admin/navigation/change', 'Navigation\NavigationController@changeProperty')->name('navigation.change');
    Route::post('/admin/navigation/get', 'Navigation\NavigationController@getItems')->name('navigation.get');
    Route::post('/admin/navigation/get/routes', 'Navigation\NavigationController@getRoutes')->name('navigation.routes.get');


    /////////////***************NAVIGATION**********************


    //***************PERMISSIONS**********************
    Route::get('/admin/permissions', 'Permission\PermissionController@index')->name('permissions.index');
    Route::get('/admin/permissions/{id}', 'Permission\PermissionController@show')->name('permissions.show')->where('id', '[0-9]+');
    Route::get('/admin/permissions/create', 'Permission\PermissionController@create')->name('permissions.create');
    Route::post('/admin/permissions/store', 'Permission\PermissionController@store')->name('permissions.store');
    Route::post('/admin/permissions/destroy', 'Permission\PermissionController@destroy')->name('permissions.destroy');
    Route::post('/admin/permissions/ajax/change', 'Permission\PermissionController@changeProperty')->name('permissions.change');
    Route::post('/admin/permissions/ajax/get', 'Permission\PermissionController@getItems')->name('permissions.ajax.get');


    /////////////***************PERMISSIONS**********************


    //***************SERVICES**********************


    //PROPERTY
    Route::get('/admin/services/{type}/properties', 'Service\ServicePropertyController@index')->name('services.properties.index');
    Route::get('/admin/services/{type}/properties/{id}', 'Service\ServicePropertyController@show')->name('services.properties.show')->where('id', '[0-9]+');
    Route::get('/admin/services/{type}/properties/create', 'Service\ServicePropertyController@create')->name('services.properties.create');
    Route::get('/admin/services/{type}/properties/{id}/edit', 'Service\ServicePropertyController@edit')->name('services.properties.edit');
    Route::post('/admin/services/{type}/properties/store', 'Service\ServicePropertyController@store')->name('services.properties.store');
    Route::post('/admin/services/{type}/properties/{id}/update', 'Service\ServicePropertyController@update')->name('services.properties.update');
    Route::post('/admin/services/{type}/properties/{id}/destroy', 'Service\ServicePropertyController@destroy')->name('services.properties.destroy');
    Route::post('/admin/ajax/services/{type}/properties/destroy', 'Service\ServicePropertyController@destroy_property')->name('services.properties.ajax.destroy');

    //SETTING
    Route::get('/admin/services/{type}/settings', 'Service\ServicePropertyController@settings')->name('services.settings.edit');
    Route::post('/admin/services/{type}/settings/edit', 'Service\ServicePropertyController@updateSettings')->name('services.settings.update');

    //ITEM
    Route::get('/admin/services/{type}/{id}', 'Service\ServiceController@show')->name('services.show')->where('id', '[0-9]+');
    Route::get('/admin/services/{type}/{filters?}', 'Service\ServiceController@index')->name('services.index')->where('filters?', '^(?!properties|settings)$');
    Route::post('/admin/services/{type}/{id}/update', 'Service\ServiceController@update')->name('services.update')->where('id', '[0-9]+');
    Route::post('/admin/services/{type}/get', 'Service\ServiceController@getServiceInfo')->name('services.get');
    Route::post('/admin/services/{type}/change', 'Service\ServiceController@changeSituation')->name('services.change');
    Route::post('/admin/services/{type}/ajax/destroy', 'Service\ServiceController@destroy')->name('services.destroy');


    /////////////***************SERVICES**********************

    Route::post('/admin/ajax/service/{type}/refresh', 'Service\ServiceController@refresh')->name('services.refresh');
    Route::get('/admin/reserves/get/{situations}', 'ReserveController@getReserves')->name('admin.reserves.get.with.situations');


});












