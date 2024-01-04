<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\PublicationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\customer\AuthController::class, 'loginForm'])->name('login-form');
    Route::post('/logout', [App\Http\Controllers\customer\AuthController::class, 'logout'])->name('logout');

Route::prefix('customer')->group(function () {


    Route::get('/register', [App\Http\Controllers\customer\AuthController::class, 'registerForm'])->name('register-form');
    Route::post('/register/post', [App\Http\Controllers\customer\AuthController::class, 'register'])->name('customer-register');
    Route::post('/login/post', [App\Http\Controllers\customer\AuthController::class, 'login'])->name('customer-login');
    // Route::post('/logout', [App\Http\Controllers\customer\AuthController::class, 'logout'])->name('customer-logout');

});

Route::prefix('customer')->middleware(['auth', 'customer'])->group(function () {

    Route::get('/home', [App\Http\Controllers\customer\HomeController::class, 'index'])->name('customer-home');
    Route::get('/profile', [App\Http\Controllers\customer\HomeController::class, 'profile'])->name('customer-profile');
    Route::post('/profile/update', [App\Http\Controllers\customer\HomeController::class, 'updateProfile'])->name('update-profile');
    Route::post('/deactivate-account', [App\Http\Controllers\customer\HomeController::class, 'deactivateAccount'])->name('deactivate-account');


    Route::get('/submit-order/list', [App\Http\Controllers\customer\SubmitOrderController::class, 'listSubmitOrder'])->name('list-submit-order');
    Route::get('/submit-order/create', [App\Http\Controllers\customer\SubmitOrderController::class, 'createSubmitOrder'])->name('create-submit-order');
    Route::post('/submit-order/post', [App\Http\Controllers\customer\SubmitOrderController::class, 'postSubmitOrder'])->name('post-submit-order');

    Route::get('/request-recommendation/list', [App\Http\Controllers\customer\RecommendationController::class, 'listRequestRecommendation'])->name('list-request-recommendation');
    Route::get('/request-recommendation/create', [App\Http\Controllers\customer\RecommendationController::class, 'createRequestRecommendation'])->name('create-request-recommendation');
    Route::post('/request-recommendation/post', [App\Http\Controllers\customer\RecommendationController::class, 'postRequestRecommendation'])->name('post-request-recommendation');
});

// Route::prefix('admin')->group(function () {
//     // Authentication Routes
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
// });

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::resource('publications', PublicationController::class);
    Route::get('/filter-publications', [App\Http\Controllers\PublicationController::class, 'filterPublications'])->name('filter-publications');

    Route::get('/orders', [App\Http\Controllers\HomeController::class, 'order'])->name('admin-order');
    Route::get('/recommendations', [App\Http\Controllers\HomeController::class, 'recommendation'])->name('admin-recommendation');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/staff-users', [App\Http\Controllers\UserController::class, 'staff'])->name('staff-users');
    Route::post('/update-approval/{id}', [App\Http\Controllers\UserController::class, 'updateApproval'])->name('update-approval');
    Route::resource('products', ProductController::class);
    Route::resource('popups', PopupController::class);
    Route::post('/toggle-popup/{id}', [App\Http\Controllers\PopupController::class, 'togglePopup'])->name('toggle.popup');

});
