<?php

use App\Http\Controllers\ApelController;
use App\Http\Controllers\KelompokController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


// Route::view('/', 'auth.login');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['auth', 'kelompok'])->group(function () {
            Route::resource('/kelompok', KelompokController::class);
        });
    // Route::resource('/kelompok', KelompokController::class);
    Route::resource('/apel', ApelController::class);

});
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::middleware(['auth', 'kelompok'])->group(function () {
//     Route::resource('/kelompok', KelompokController::class);
// });
// Route::middleware(['auth', 'apel'])->group(function () {
//     Route::resource('/apel', ApelController::class);
// });
