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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

Route::group(['namespace' => 'Api'], function () {
    Route::get('/all-categories','ApiHomeController@allCategories');
    Route::post('/products-by-category','ApiHomeController@productByCategory');
    Route::get('/about-us','ApiHomeController@aboutUsInfo');
    Route::post('/new-order','ApiHomeController@newOrder');

});
