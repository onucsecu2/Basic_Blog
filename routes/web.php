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
Route::group(['middleware' => 'admin_guest'], function() {
    
    Route::get('/admin_login', 'Admin\LoginController@showLoginForm');
    Route::post('/admin_login', 'Admin\LoginController@login');
    
});
Route::group(['middleware' => 'admin_auth'], function(){
        Route::post('/admin_logout', 'Admin\LoginController@logout');
        Route::get('/admin_home','AdminController@index');
        Route::any('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/admin/dashboard-approved', 'AdminController@dashboard_post');
    });

Auth::routes();

Route::any('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/dashboard-approved', 'HomeController@dashboard_post');



