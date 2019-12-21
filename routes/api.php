<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('login', 'AuthAPIController@login');
// Route::post('signup', 'AuthAPIController@signup');

Route::prefix('user')->group(function () {
    Route::post('login','AuthAPIController@login' );
    Route::post('signup','AuthAPIController@signup');
});

Route::middleware('auth:api')->group(function () {
    Route::resource('bill_ship_addresses', 'BillShipAddressAPIController');
    Route::resource('users', 'UserAPIController');
    Route::resource('courier_providers', 'CourierProviderAPIController');
    Route::resource('courier_provider_users', 'CourierProviderUsersAPIController');
    Route::resource('notifications', 'NotificationsAPIController');
    Route::resource('consignments', 'ConsignmentAPIController');
});

Route::fallback(function() {
    return 'You are lost';
});
