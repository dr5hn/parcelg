<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('userTypes', 'UserTypeController');

    Route::resource('countries', 'CountryController');

    Route::resource('states', 'StateController');

    Route::resource('cities', 'CityController');

    Route::resource('billShipAddresses', 'BillShipAddressController');

    Route::resource('documents', 'DocumentsController');

    Route::resource('users', 'UserController');

    Route::resource('courierProviders', 'CourierProviderController');

    Route::resource('courierProviderUsers', 'CourierProviderUsersController');

    Route::resource('deliveryTypes', 'DeliveryTypeController');

    Route::resource('consignmentTypes', 'ConsignmentTypeController');

    Route::resource('notificationTypes', 'NotificationTypeController');

    Route::resource('notifications', 'NotificationsController');

    Route::resource('consignments', 'ConsignmentController');

    //
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    );
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
