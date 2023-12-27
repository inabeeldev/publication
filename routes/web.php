<?php

use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/customer-register', [App\Http\Controllers\customer\AuthController::class, 'register'])->name('customer-register');
Route::post('/customer-login', [App\Http\Controllers\customer\AuthController::class, 'login'])->name('customer-login');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/submit-order', [App\Http\Controllers\HomeController::class, 'submitOrder'])->name('submit-order');
    Route::get('/request-recommendation', [App\Http\Controllers\HomeController::class, 'requestRecommendation'])->name('request-recommendation');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('/update-approval/{id}', [App\Http\Controllers\UserController::class, 'updateApproval'])->name('update-approval');
    Route::resource('products', ProductController::class);
    Route::resource('popups', PopupController::class);
});
