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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

### Inventory
Route::get('/inventory', [App\Http\Controllers\ManagementInventory::class, 'index'])->name('inventory_index');
Route::get('/inventory/details/{id}', [App\Http\Controllers\ManagementInventory::class, 'details'])->name('inventory_details');
Route::get('/inventory/create', [App\Http\Controllers\ManagementInventory::class, 'store_index'])->name('inventory_create');
Route::post('/inventory/create', [App\Http\Controllers\ManagementInventory::class, 'store'])->name('inventory_create_form');
Route::get('/inventory/edit/{id}', [App\Http\Controllers\ManagementInventory::class, 'edit_page'])->name('inventory_edit');
Route::post('/inventory/update/{id}', [App\Http\Controllers\ManagementInventory::class, 'update'])->name('inventory_edit_post');
Route::get('/inventory/delete/{id}', [App\Http\Controllers\ManagementInventory::class, 'delete'])->name('inventory_delete');

### Room 
Route::get('/room', [App\Http\Controllers\ManagementRoom::class, 'index'])->name('room_index');
Route::get('/room/details/{id}', [App\Http\Controllers\ManagementRoom::class, 'details'])->name('room_details');
Route::get('/room/create', [App\Http\Controllers\ManagementRoom::class, 'store_index'])->name('room_create');
Route::post('/room/create', [App\Http\Controllers\ManagementRoom::class, 'store'])->name('room_create_form');
Route::get('/room/edit/{id}', [App\Http\Controllers\ManagementRoom::class, 'edit_page'])->name('room_edit');
Route::get('/room/delete/{id}', [App\Http\Controllers\ManagementRoom::class, 'delete'])->name('room_delete');
Route::post('/room/update/{id}', [App\Http\Controllers\ManagementRoom::class, 'update'])->name('room_update');

