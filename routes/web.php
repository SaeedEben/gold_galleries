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

Route::get('/fill_data', [\App\Http\Controllers\CsvController::class, 'csvToArray']);
Route::get('/like', [\App\Http\Controllers\CsvController::class, 'getLikes']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/gallery', [\App\Http\Controllers\CsvController::class, 'selectGallery'])->name('gallery');
    Route::get('/data', [\App\Http\Controllers\CsvController::class, 'getData'])->name('data');
});
