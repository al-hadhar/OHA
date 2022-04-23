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


Route::resource('animal_surveillances', 'API\AnimalSurveillanceAPIController');

Route::resource('human_surveillances', 'API\HumanSurveillanceAPIController');


Route::resource('upload_headers', 'API\UploadHeaderAPIController');


/*Route::resource('regional_zones', 'API\RegionalZonesAPIController');*/

Route::resource('regions', 'API\RegionsAPIController');

Route::resource('councils', 'API\CouncilsAPIController');


Route::resource('zones', 'API\ZonesAPIController');
