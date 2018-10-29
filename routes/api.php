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


Route::post('/signup','AdminsController@signupApi');

Route::post('/login','AdminsController@loginApi');

Route::post('/login/viatoken','AdminsController@viaToken');

Route::get('/cate','ApisController@cate');

Route::put('/post/{post}/edit','ApisController@editPost');

Route::delete('/post/{post}/delete','ApisController@deletePost');




// test validate user 
Route::post('/user/vali','ApisController@try');