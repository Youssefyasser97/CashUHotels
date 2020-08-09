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

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',"HotelController@index");
Route::get('hotels',"HotelController@index");
Route::get('ourhotels',"HotelController@index");
Route::get('besthotels',"HotelController@bestHotels");
Route::get('tophotel',"HotelController@topHotel");
Route::get('tophotels',"HotelController@topHotel");