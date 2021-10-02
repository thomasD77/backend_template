<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// General settings
Auth::routes(['verify'=> true]);

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('admin/dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::get('/cronjob', function()
{
    Artisan::call('schedule:run', );
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Backend Routes
Route::group(['prefix'=>'admin', 'middleware'=>[ 'auth', 'verified']], function(){
    Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::resource('roles', App\Http\Controllers\AdminRolesController::class);
    Route::resource('billing', App\Http\Controllers\AdminBillingController::class);
    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::resource('posts', App\Http\Controllers\AdminPostController::class);
    Route::resource('faqs', App\Http\Controllers\AdminFaqController::class);
    Route::get('faqs/delete/{id}', 'App\Http\Controllers\AdminFaqController@destroy')->name('faqs.delete');
    Route::get('gallery', 'App\Http\Controllers\AdminPostController@gallery')->name('post.gallery');
    Route::resource('submissions', App\Http\Controllers\AdminSubmissionController::class);
    Route::resource('postcategories', App\Http\Controllers\AdminPostCategoryController::class);
    Route::resource('comments', App\Http\Controllers\AdminCommentController::class);
    Route::post('comments/reply', 'App\Http\Controllers\AdminCommentController@storeReply');
    Route::get('archive/submissions', 'App\Http\Controllers\AdminSubmissionController@archive')->name('submission.archive');
    Route::get('archive/posts', 'App\Http\Controllers\AdminPostController@archive')->name('post.archive');
    Route::get('mailchimp', 'App\Http\Controllers\MailChimpController@index')->name('mailchimp.form');
    Route::get('mailchimp/contact', 'App\Http\Controllers\MailChimpController@contact')->name('mailchimp.contact');
    Route::post('password/{id}', 'App\Http\Controllers\AdminUsersController@updatePassword');
    Route::resource('credentials', App\Http\Controllers\AdminCompanyCredentialsController::class);
    Route::resource('homePage', App\Http\Controllers\HomePageController::class);
    Route::resource('disclaimer', App\Http\Controllers\DisclaimerController::class);
    Route::resource('privacy', App\Http\Controllers\PrivacyController::class);
    Route::resource('cookie', App\Http\Controllers\CookieController::class);
    Route::resource('services', App\Http\Controllers\AdminServiceController::class);
    Route::resource('service-categories', App\Http\Controllers\AdminServiceCategory::class);
    Route::get('layout', 'App\Http\Controllers\AdminServiceController@layout');
    Route::get('archive/services', 'App\Http\Controllers\AdminServiceController@archive')->name('services.archive');
    Route::get('components', 'App\Http\Controllers\ComponentController@index')->name('components.index');
    Route::resource('promos', App\Http\Controllers\AdminPromoController::class);
    Route::get('archive/promos', 'App\Http\Controllers\AdminPromoController@archive')->name('promos.archive');
    Route::resource('clients', App\Http\Controllers\AdminClientController::class);
    Route::get('archive/clients', 'App\Http\Controllers\AdminClientController@archive')->name('clients.archive');
    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);
    Route::resource('loyals', App\Http\Controllers\AdminLoyalController::class);
    Route::resource('sources', App\Http\Controllers\AdminSourceController::class);
});
