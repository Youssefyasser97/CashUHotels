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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// // list hotels
// Route::get('hotels', 'HotelController@index');

// // list single hotel
// Route::get('hotel/{id}', 'HotelController@show');

// // create new hotel
// Route::post('hotel', 'HotelController@store');

// // update hotel
// Route::put('hotel/{id}', 'HotelController@store');

// // delete hotel
// Route::delete('hotel/{id}', 'HotelController@destroy');



// // for tophotels

// // list tophotels
// Route::get('tophotels', 'TophotelController@index');

// // list single tophotel
// Route::get('tophotel/{id}', 'TophotelController@show');

// // create new tophotel
// Route::post('tophotel', 'TophotelController@store');

// // update tophotel
// Route::put('tophotel/{id}', 'TophotelController@store');

// // delete tophotel
// Route::delete('tophotel/{id}', 'TophotelController@destroy');




Route::get('hotels',"HotelController@index");
