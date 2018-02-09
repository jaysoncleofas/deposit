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

Route::get('/', function () {
    return redirect('login');
});


Route::group(['middleware' => 'prevent-back-history'], function () {
    Auth::routes();
    Route::get('/jc', 'HomeController@index')->name('jc');
    Route::resource('/jc/savings', 'SavingsController');
    Route::post('getDepositData', 'SavingsController@getDepositData');
    Route::post('DepositDashboard', 'SavingsController@DepositDashboard');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
