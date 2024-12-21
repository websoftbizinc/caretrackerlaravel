<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/admin', 'Auth\AuthController@index');
Route::get('/forgot-password', function () {
    return view('welcome');
});
Route::get('/reset-password/{token}', 'Auth\AuthController@resetPassword')->name('reset-password');
Route::get('/', 'Auth\AuthController@index')->name('dashboard');
Route::post('/postLogin', 'Auth\AuthController@postLogin')->name('postLogin');

Route::group(['middleware' => \App\Http\Middleware\RedirectIfAuthenticated::class], function () {
    Route::get('/dashboard', 'CareesController@index')->name('dashboard');

    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/all', 'UserController@index')->name('allUsers');
        Route::get('/datatableList', 'UserController@datatableList')->name('allUsersDatatableList');
//        Route::get('/create', 'Auth\UserController@create')->name('users.create');
//        Route::post('/save/{id?}', 'Auth\UserController@save')->name('users.save');
        Route::get('/detail/{id}', 'UserController@detail')->name('user.detail');
//        Route::get('/edit/{id}', 'Auth\UserController@edit')->name('users.edit');
//        Route::get('/delete/{id}', 'Auth\UserController@delete')->name('users.delete');
//        Route::get('/resetPassword/{id}', 'Auth\UserController@resetPassword')->name('users.resetPassword');
    });
    Route::group(['prefix' => 'carees'], function () {
        Route::get('/all', 'CareesController@index')->name('allCarees');
        Route::get('/datatableList', 'CareesController@datatableList')->name('allCareesDatatableList');
        Route::get('/detail/{id}', 'CareesController@detail')->name('Carees.detail');
    });

    Route::group(['prefix' => 'country'], function () {
        Route::get('/all', 'CountriesController@index')->name('country.all');
        Route::get('/create', 'CountriesController@create')->name('country.create');
        Route::get('/edit/{id}', 'CountriesController@edit')->name('country.edit');
        Route::get('delete/{id}', 'CountriesController@delete')->name('country.delete');
        Route::post('save/{id?}', 'CountriesController@save')->name('country.save');
    });

    Route::group(['prefix' => 'state'], function () {
        Route::get('/all', 'StatesController@index')->name('state.all');
        Route::get('/create', 'StatesController@create')->name('state.create');
        Route::get('/edit/{id}', 'StatesController@edit')->name('state.edit');
        Route::get('delete/{id}', 'StatesController@delete')->name('state.delete');
        Route::post('save/{id?}', 'StatesController@save')->name('state.save');
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('/all', 'CitiesController@index')->name('city.all');
        Route::get('/create', 'CitiesController@create')->name('city.create');
        Route::get('/edit/{id}', 'CitiesController@edit')->name('city.edit');
        Route::get('delete/{id}', 'CitiesController@delete')->name('city.delete');
        Route::post('save/{id?}', 'CitiesController@save')->name('city.save');
        Route::post('ajaxGetStates/{id}', 'CitiesController@ajaxGetStates')->name('city.ajaxGetStates');
    });
});
//Route::get('/admin', function () {
//    return view('admin.Auth.login');
//});
