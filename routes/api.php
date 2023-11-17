<?php
namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/messages', function (){
    return "hello from api";
});

    Route::get('user/posts', 'App\Http\Controllers\Api\V2\PostController@posts');
    Route::get('user/features', 'App\Http\Controllers\Api\V2\FeatureController@features')->middleware('auth:sanctum'); //done
    Route::get('user/homes', 'App\Http\Controllers\Api\V2\UserHomeController@homes')->middleware('auth:sanctum');
    Route::get('user/categories', 'App\Http\Controllers\Api\V2\CategoryController@categories')->middleware('auth:sanctum');
    Route::get('user/social_media', 'App\Http\Controllers\Api\V2\SocialMediaController@social_media')->middleware('auth:sanctum');
    Route::get('user/about_us', 'App\Http\Controllers\Api\V2\AboutController@abouts')->middleware('auth:sanctum');

    
    //user APIs bearer /
    Route::get('user/projects', 'App\Http\Controllers\Api\V2\ProjectController@projects'); //get all projects from database 
    Route::get('user/project_history', 'App\Http\Controllers\Api\V2\ProjectController@user_projects')->middleware('auth:sanctum');//get for user his projects
    Route::post('user/add_project', 'App\Http\Controllers\Api\V2\ProjectController@store_project_request')->middleware('auth:sanctum'); // add project for his project list user 
    Route::post('user/request_project', 'App\Http\Controllers\Api\V2\ProjectController@store_project_request')->middleware('auth:sanctum'); // add project for his project list user 
    Route::post('user/project_request/delete', 'App\Http\Controllers\Api\V2\ProjectController@delete_request')->middleware('auth:sanctum'); // Delete proeject Request
    Route::post('user/project_request/update', 'App\Http\Controllers\Api\V2\ProjectController@update_project_request_info')->middleware('auth:sanctum'); // edit project Request
    Route::post('user/add_project', 'App\Http\Controllers\Api\V2\ProjectController@store_project_request')->middleware('auth:sanctum'); // add project for his project list user 
    Route::post('user/project_details', 'App\Http\Controllers\Api\V2\ProjectController@project_details_by_id')->middleware('auth:sanctum'); // add project for his project list user 

    Route::get('user/wallet', 'App\Http\Controllers\Api\V2\ProjectController@wallet')->middleware('auth:sanctum');
  
    Route::get('states', 'App\Http\Controllers\Api\V2\ProjectController@getStates');
    Route::get('countries', 'App\Http\Controllers\Api\V2\ProjectController@getCountries');

    Route::get('cities-by-state/{state_id}', 'App\Http\Controllers\Api\V2\ProjectController@getCitiesByState');
    Route::get('states-by-country/{country_id}', 'App\Http\Controllers\Api\V2\ProjectController@getStatesByCountry');


    //new adding project
    Route::post('user/add_new_project_req', 'App\Http\Controllers\Api\V2\ProjectController@store_project_request_cust')->middleware('auth:sanctum'); // add project for his project list user 

    Route::group(['prefix' => 'v2/auth'], function () {
        Route::post('login', 'App\Http\Controllers\Api\V2\AuthController@login');
        Route::post('signup', 'App\Http\Controllers\Api\V2\AuthController@signup');
        Route::post('destroyUser', 'App\Http\Controllers\Api\V2\AuthController@destroyUser');
        Route::post('social-login', 'App\Http\Controllers\Api\V2\AuthController@socialLogin');
        Route::post('password/forget_request', 'App\Http\Controllers\Api\V2\PasswordResetController@forgetRequest');
        Route::post('password/confirm_reset', 'App\Http\Controllers\Api\V2\PasswordResetController@confirmReset');
        Route::post('password/resend_code', 'App\Http\Controllers\Api\V2\PasswordResetController@resendCode');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('logout', 'App\Http\Controllers\Api\V2\AuthController@logout');
            Route::get('destroyUser', 'App\Http\Controllers\Api\V2\AuthController@destroyUser');
            Route::get('user', 'App\Http\Controllers\Api\V2\AuthController@user');
        });
        Route::post('resend_code', 'App\Http\Controllers\Api\V2\AuthController@resendCode');
        Route::post('confirm_code', 'App\Http\Controllers\Api\V2\AuthController@code_verfication');
    });

