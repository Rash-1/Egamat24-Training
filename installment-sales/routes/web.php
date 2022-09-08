<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PaymentConditionController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\ProvidersMiddleware;
use App\Http\Middleware\ClientsMiddleware;
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
Route::controller(HomePageController::class)->group(function (){
    Route::get('/','index')->name('home-page');
    Route::get('/category-services/{workField}','work_field_services')->name('work-field-services');
});


Route::view('/choose-designation', 'chooseDesignation')->name('choose-designation');

Route::prefix('client')
    ->name('client.')
    ->controller(ClientController::class)
    ->group(function () {

        Route::view('/login', 'client/authentication/login')->name('login-form');
        Route::view('/register', 'client/authentication/register')->name('register-form');

        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');

        Route::get('/logout', 'logout')->name('logout');
    });

Route::prefix('provider')
    ->name('provider.')
    ->middleware(ProvidersMiddleware::class)
    ->group(function () {
        Route::view('/login', 'provider/authentication/login')->name('login-form')->withoutMiddleware(ProvidersMiddleware::class);
        Route::view('/register', 'provider/authentication/register')->name('register-form')->withoutMiddleware(ProvidersMiddleware::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(ProviderController::class)->group(function () {
            Route::post('/login', 'login')->name('login')->withoutMiddleware(ProvidersMiddleware::class);
            Route::post('/register', 'register')->name('register')->withoutMiddleware(ProvidersMiddleware::class);

            Route::get('/logout', 'logout')->name('logout');
            Route::get('/profile/{provider}', 'showProfile')->name('profile');
        });
        Route::controller(ServiceController::class)
            ->name('services.')
            ->prefix('services')
            ->group(function () {
                Route::view('/define', 'provider/services/define')->name('define-form');

                Route::post('/define', 'define')->name('define');
            });
        Route::controller(PaymentConditionController::class)
            ->name('payment-conditions.')
            ->prefix('payment-conditions')
            ->group(function () {
                Route::view('/define', 'provider/payment-conditions/define')->name('define-form');

                Route::post('/define', 'define')->name('define');
            });
    });
