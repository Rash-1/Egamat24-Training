<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomePageController;
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

Route::get('/', [HomePageController::class, 'index'])->name('home-page');
Route::view('/choose-designation', 'chooseDesignation')->name('choose-designation');

Route::prefix('client')->name('client.')->controller(ClientController::class)->group(function () {

    Route::view('/login', 'client/login')->name('login-form');
    Route::view('/register','client/register')->name('register-form');

    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');

    Route::get('/logout', 'logout')->name('logout');
});
