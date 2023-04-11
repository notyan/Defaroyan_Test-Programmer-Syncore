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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Biodata index page
    Route::get('/biodata', 'App\Http\Controllers\BiodataController@index')->name('biodata.index');

    // Biodata create page
    Route::get('/biodata/create', 'App\Http\Controllers\BiodataController@create')->name('biodata.create');

    // Biodata store action
    Route::post('/biodata', 'App\Http\Controllers\BiodataController@store')->name('biodata.store');
    
    // Show biodata
    Route::get('/biodata/{id}', [App\Http\Controllers\BiodataController::class, 'show'])->name('biodata.show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
