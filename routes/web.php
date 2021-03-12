<?php

use App\PaymentGateway\Payment;

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HighchartController;

Route::get('/', function () {
    return view('auth.login');
});

//laravel service provider class and facade class
Route::get('/payment', function () {
    return Payment::process();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chart', [HighchartController::class, 'handleChart']);

//Route::resource('customers', CustomerController::class);

Route::middleware('auth')->group( function () {
    Route::resource('customers', CustomerController::class);
});


