<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

Route::get('/', function () {
    // $tr = new GoogleTranslate('en');
    // return $tr->setSource("en")->setTarget("fr")->translate("Hello World");
    return redirect('/login');
});

Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('/product', [App\Http\Controllers\AdminController::class, 'show_product'])->name('product');
    Route::controller(App\Http\Controllers\AboutController::class)->group(function () {

    Route::get('/about/add', 'create')->name('create.about');
    Route::post('/about/store_abouts', 'store_abouts')->name('abouts.add');
    Route::get('/about/all', 'all_abouts')->name('about.all');
    Route::get('/about/admin/{id}/edit', 'about_edit')->name('about.edit'); //edit project 
    Route::post('/about/update/{id}', 'about_update')->name('about.update');
    Route::post('/about/status', 'updateStatusAbout')->name('about.status');

});
Route::controller(App\Http\Controllers\PostController::class)->group(function () {

    Route::get('/post/add', 'create')->name('create.post');
    Route::post('/post/store_posts', 'store_posts')->name('posts.add');
    Route::get('/post/all', 'all_post')->name('post.all');
    Route::get('/post/admin/{id}/edit', 'post_edit')->name('post.edit'); //edit project 
    Route::post('/post/update/{id}', 'post_update')->name('post.update');
    Route::post('/post/status', 'updateStatusPost')->name('post.status');

});

Route::controller(App\Http\Controllers\SocailMediaController::class)->group(function () {

    Route::get('/social/add', 'create')->name('create.about');
    Route::post('/social/store_abouts', 'store_social_media')->name('social.add');
    Route::get('/social/all', 'all_social_media')->name('social.all');
    Route::get('/social/admin/{id}/edit', 'social_edit')->name('social.edit'); //edit project 
    Route::post('/social/update/{id}', 'social_update')->name('social.update');
    Route::post('/social/status', 'updateStatusSocailMedia')->name('social.status');

});
    Route::controller(App\Http\Controllers\ProjectController::class)->group(function () {

        Route::get('/project/create/', 'create')->name('project.create');
        Route::get('/project/add_user/', 'add_user_project')->name('add_project.user');

        Route::post('/project/store/', 'store_project')->name('project.store');
        Route::post('/add_project/user/', 'store_user_project')->name('project_user.store');


        Route::post('/get-models', 'getStates')->name('get-model');

        Route::post('/car/store_car_model/', 'store_car_model')->name('cars.store_car_model');
        Route::post('/car/update_car/', 'update_car')->name('cars.update');

        Route::get('/projects/all', 'all_projects')->name('projects.all');
        Route::get('/requests_projecrs/all', 'all_projects_requests')->name('request_projects.all');

        Route::post('/car/status', 'updateStatusProject')->name('project.status');

        Route::get('/project_request/admin/{id}/edit', 'project_request_edit')->name('project.reqest_edit'); //edit project request
        Route::get('/project/admin/{id}/edit', 'project_edit')->name('project.edit'); //edit project 

        Route::get('/car/admin/{id}', 'car_brand_delete')->name('cars.brand_delete');

        Route::get('/car_model/admin/{id}', 'cars_model_delete')->name('cars.model_delete');


        Route::post('/project/request_update/{id}', 'request_update')->name('project_req.update');
        Route::post('/project/update/{id}', 'project_update')->name('project.update');

        Route::post('/cars/model_update/{id}', 'model_update')->name('car_model.update');



    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/resend', 'resend')->name('verification.resend');
    Route::get('/verification-confirmation/{code}', 'verification_confirmation')->name('email.verification.confirmation');
    Route::get('/verification-confirmation/{code}', 'verification_confirmation')->name('email.verification.confirmation');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
