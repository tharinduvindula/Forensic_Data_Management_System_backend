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

Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('adduser', 'AuthController@adduser');
    Route::post('updateuser', 'AuthController@updateuser');
    Route::post('deleteuser', 'AuthController@deleteuser');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('getalluser', 'AuthController@getalluser');
    Route::post('getuser', 'AuthController@getuser');
    Route::post('temporarydisable', 'AuthController@temporydisable');
    Route::post('defaultpassword', 'AuthController@defaultpassword');
    Route::post('multiuserhandleforuser', 'multiuserhandle@userprofilehandle');
    Route::post('multiuserhandleforrecode', 'multiuserhandle@recodehandle');
    Route::post('removmultiuserhandle', 'multiuserhandle@removefromuserprofilehandle');
    Route::post('sendPasswordResetLink', 'ResetpasswordController@sendEmail');
    Route::post('changePassword', 'ChangePasswordController@process');
});
