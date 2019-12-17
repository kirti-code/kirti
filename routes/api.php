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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/create', 'api\CategoryController@create');

Route::post('/storeData', 'api\CategoryController@storeData');
Route::delete('/deleteData/{id}', 'api\CategoryController@deleteData');
Route::get('/showData', 'api\CategoryController@showData');
Route::put('/updateData/{id}', 'api\CategoryController@updateData');

Route::post('login', 'api\APILoginController@login');
Route::get('authUser', 'api\APILoginController@getAuthenticatedUser');

/* Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
}); */
