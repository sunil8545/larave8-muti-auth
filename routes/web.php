<?php

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

Route::redirect('/','login');

Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::redirect('/','admin/login');

    //Controller Routes
    Route::group(['namespace' => 'Controllers\Admin'], function () {
        
        Route::group(['namespace' => 'Auth'], function() {
            Route::get('login','LoginController@login')->name('login');
            Route::post('password-email','PasswordResetLinkController@store')->name('password.email');

            Route::get('password-reset','NewPasswordController@create')->name('password.reset');
            Route::post('password-update','NewPasswordController@store')->name('password.update');
            
        });
        

        Route::group(['middleware'=>'auth:admin'],function (){

            Route::get('dashboard','DashboardController@index')->name('dashboard');
            Route::get('profile','AdminController@profile')->name('profile');
            Route::post('profile','AdminController@updateProfile');
            Route::post('logout','AdminController@logout')->name('logout');
            
            Route::get('user', 'UserController@index')->name('user.index');
            Route::get('role', 'RoleController@index')->name('role.index');

        });
    });

    //Livewire Route
    Route::group(['namespace' => 'Livewire\Admin'], function () {
        Route::get('forgot-password',Auth\ResetLink::class)->name('password.request');
    });
});


Route::group(['as' => 'user.'], function() {
    
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

