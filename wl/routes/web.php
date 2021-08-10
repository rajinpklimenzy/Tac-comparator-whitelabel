<?php

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
 Route::get('/', function (Request $request) {

        dd($request->getHost());
      
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});

Route::domain('whitelable.wx.agency/wl/')->group(function () { 
  
    
    
    // Login Routes
    Route::get('login', 'Auth\LoginController@showDomainForm')->name('home.local');
    Route::post('login', 'Auth\LoginController@login');



    

});

// Ensure that the tenant exists with the tenant.exists middleware
Route::middleware('tenant.exists')->group(function () {
    // Not Logged In
    Route::get('/', function () {
       
        return view('welcome');
    });

    // Login Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
    // Password Reset Routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Email Verification Routes
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    // Register Routes
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    //Admin
    Route::get('/admin', 'Admin\AdminController@index')->name('admin.login');
    Route::get('whitelabel', 'Admin\WhitelabelController@index')->name('whitelabel');
    Route::post('whitelabel/create', 'Admin\WhitelabelController@create')->name('whitelabel.create');
    Route::get('whitelabel/delete/{id}/{webid}', 'Admin\WhitelabelController@delete')->name('whitelabel.delete');
});

// Logged in
Route::get('/home', 'HomeController@index')->name('home');
