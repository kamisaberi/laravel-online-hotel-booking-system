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
Route::get('/home', 'HomeController@index2')->name('home.index2');
Route::any('/services/resume/{type}/{step?}/{refer?}', 'Service\ServiceController@resumeService')->name('home.services.resume');
Route::any('/services/{type}/{step?}/{refer?}', 'Service\ServiceController@launchService')->name('home.services.launch');

Route::get('/items/{type}', 'HomeController@showItems')->name('home.item.all');
Route::get('/items/{type}/{id}', 'HomeController@showItem')->name('home.item.show');




Route::get('/booking/start/{room}', 'HomeController@startBooking')->name('home.booking.start');
Route::post('/booking/update/price/{type}', 'HomeController@updatePrices')->name("home.booking.update.price");
Route::post('/booking/save/{room}', 'HomeController@saveBooking')->name('home.booking.save');
Route::get('/booking/confirm/{code}', 'HomeController@confirmBooking')->name('home.booking.confirm');
Route::post('/booking/check/room_verification', 'HomeController@checkRoomVerification')->name('home.booking.check.room');
Route::get('/booking/payout/{code}', 'HomeController@payoutBooking')->name('home.booking.payout');

Route::get('/booking/bank/{code?}', 'HomeController@payout')->name('home.booking.to.bank');
Route::any('/booking/returnFromBank/{code?}', 'HomeController@returnFromBank')->name('home.return.from.bank');

Route::get('/booking/finish/{code}', 'HomeController@finishBooking')->name('home.booking.finish');



Route::get('/user/{type}/enter', 'HomeController@showEnterPage')->name('home.user.enter');
Route::get('/user/{type}/login', 'HomeController@showLoginPage')->name('home.user.login');
Route::get('/user/{type}/register', 'HomeController@showRegisterPage')->name('home.user.register');
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
    //TYPE
    Route::get('/admin/items', 'Item\ItemTypeController@index')->name('items.types.index');
    Route::get('/admin/items/{id}', 'Item\ItemTypeController@show')->name('items.types.show')->where('id', '[0-9]+');
    Route::get('/admin/items/create', 'Item\ItemTypeController@create')->name('items.types.create');
    Route::get('/admin/items/{id?}/edit', 'Item\ItemTypeController@edit')->name('items.types.edit');
    Route::post('/admin/items/store', 'Item\ItemTypeController@store')->name('items.types.store');
    Route::post('/admin/items/{id}/update', 'Item\ItemTypeController@update')->name('items.types.update');
    Route::post('/admin/items/destroy', 'Item\ItemTypeController@destroy')->name('items.types.destroy');
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
    Route::get('/admin/items/{type}/{filters?}', 'Item\ItemController@index')->name('items.index')->where('filters', '^(?!properties)$');
    Route::post('/admin/items/{type}/store', 'Item\ItemController@store')->name('items.store');
    Route::post('/admin/items/{type}/{id}/update', 'Item\ItemController@update')->name('items.update')->where('id', '[0-9]+');
    Route::post('/admin/items/{type}/ajax/destroy', 'Item\ItemController@destroy')->name('items.destroy');
    Route::post('/admin/items/{type}/change', 'Item\ItemController@changeProperty')->name('items.change');
    /////////////***************ITEM**********************

    //***************USERS**********************
    //TYPE
    Route::get('/admin/users', 'User\UserTypeController@index')->name('users.types.index');
    Route::get('/admin/users/{id}', 'User\UserTypeController@show')->name('users.types.show')->where('id', '[0-9]+');
    Route::get('/admin/users/create', 'User\UserTypeController@create')->name('users.types.create');
    Route::get('/admin/users/{id?}/edit', 'User\UserTypeController@edit')->name('users.types.edit');
    Route::post('/admin/users/store', 'User\UserTypeController@store')->name('users.types.store');
    Route::post('/admin/users/{id}/update', 'User\UserTypeController@update')->name('users.types.update');
    Route::post('/admin/users/destroy', 'User\UserTypeController@destroy')->name('users.types.destroy');

    //PROPERTY
    Route::get('/admin/users/{type}/properties', 'User\UserPropertyController@index')->name('users.properties.index');
    Route::get('/admin/users/{type}/properties/{id}', 'User\UserPropertyController@show')->name('users.properties.show')->where('id', '[0-9]+');
    Route::get('/admin/users/{type}/properties/create', 'User\UserPropertyController@create')->name('users.properties.create');
    Route::get('/admin/users/{type}/properties/{id}/edit', 'User\UserPropertyController@edit')->name('users.properties.edit');
    Route::post('/admin/users/{type}/properties/store', 'User\UserPropertyController@store')->name('users.properties.store');
    Route::post('/admin/users/{type}/properties/{id}/update', 'User\UserPropertyController@update')->name('users.properties.update');
    Route::post('/admin/users/{type}/properties/{id}/destroy', 'User\UserPropertyController@destroy')->name('users.properties.destroy');
    Route::post('/admin/ajax/users/{type}/properties/destroy', 'User\UserPropertyController@destroy_property')->name('users.properties.ajax.destroy');

    //SETTING
    Route::get('/admin/users/{type}/settings', 'User\UserPropertyController@settings')->name('users.settings.edit');
    Route::post('/admin/users/{type}/settings/update', 'User\UserPropertyController@updateSettings')->name('users.settings.update');

    //ITEM
    Route::get('/admin/users/{type}/create', 'User\UserController@create')->name('users.create');
    Route::get('/admin/users/{type}/{id}/edit', 'User\UserController@edit')->name('users.edit')->where('id', '[0-9]+');
    Route::get('/admin/users/{type}/{id}', 'User\UserController@show')->name('users.show')->where('id', '[0-9]+');
    Route::get('/admin/users/{type}/{filters?}', 'User\UserController@index')->name('users.index')->where('filters', '^(?!properties)$');
    Route::post('/admin/users/{type}/store', 'User\UserController@store')->name('users.store');
    Route::post('/admin/users/{type}/{id}/update', 'User\UserController@update')->name('users.update')->where('id', '[0-9]+');
    Route::post('/admin/users/{type}/ajax/destroy', 'User\UserController@destroy')->name('users.destroy');
    Route::post('/admin/users/{type}/change', 'User\UserController@changeProperty')->name('users.change');


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


    //TYPE
    Route::get('/admin/services', 'Service\ServiceTypeController@index')->name('services.types.index');
    Route::get('/admin/services/{id}', 'Service\ServiceTypeController@show')->name('services.types.show')->where('id', '[0-9]+');
    Route::get('/admin/services/create', 'Service\ServiceTypeController@create')->name('services.types.create');
    Route::get('/admin/services/{id?}/edit', 'Service\ServiceTypeController@edit')->name('services.types.edit');
    Route::post('/admin/services/store', 'Service\ServiceTypeController@store')->name('services.types.store');
    Route::post('/admin/services/{id}/update', 'Service\ServiceTypeController@update')->name('services.types.update');
    Route::post('/admin/services/destroy', 'Service\ServiceTypeController@destroy')->name('services.types.destroy');

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


});
