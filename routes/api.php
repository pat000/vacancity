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

Route::get('auth/facebook', 'AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'AuthController@handleProviderCallback');

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login_');

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
    Route::post('auth/logout', 'AuthController@logout');
    Route::get('auth/resendEmail', 'AuthController@resendEmail');
    
    // for basic info
    Route::get('users_infos/{slug}','UsersInfoController@index');
    Route::get('users_info/{id}','UsersInfoController@show');
    Route::post('users_info','UsersInfoController@store');
    Route::put('users_info/{id}','UsersInfoController@store');

    // for industry
    Route::get('industries','IndustryController@index');
    Route::get('industry/{id}','IndustryController@show');
    Route::post('industry','IndustryController@store');
    Route::put('industry/{id}','IndustryController@store');
    Route::delete('industry','IndustryController@destroy');

    // for work experience
    Route::get('works/{slug}','WorkExperienceController@index');
    Route::post('work','WorkExperienceController@store');
    Route::put('work/{id}','WorkExperienceController@store');
    Route::delete('work/{id}','WorkExperienceController@destroy');

    // for educ
    Route::get('educations/{slug}','EducController@index');
    Route::post('education','EducController@store');
    Route::put('education/{id}','EducController@store');
    Route::delete('education/{id}','EducController@destroy');

    // for jobs
    Route::get('jobs/{id}','JobController@index');
    Route::post('job','JobController@store');
    Route::put('job/{id}','JobController@store');
    Route::delete('job/{id}','JobController@destroy');


});

Route::group(['middleware' => 'jwt.refresh'], function(){
    Route::get('auth/refresh', 'AuthController@refresh');
});
