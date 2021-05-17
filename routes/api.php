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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['prefix' => 'v1'], function () {
    Route::get('/continents', 'ApiController@getCountriesByContinent');
    // Get All category
    Route::get('/categories', 'ApiController@getCategories');
    // Get All Radio Station -> very bad (may be pagination is good)
    Route::get('/stations', 'ApiController@getAllRadioStations');
    // Get Radio Station By Id -> for details (no need)
    Route::get('/station/{id?}', 'ApiController@getStationDetails');
    // Get Radio Station By Category
    Route::get('/stationsbycategoty/{id?}', 'ApiController@getStationByCategory');
    // Get Radio Station By Country
    Route::get('/stationsbycountry/{id?}', 'ApiController@getStationByCountry');
});