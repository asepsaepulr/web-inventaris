<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('auth/login');
});
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|staff']], function () {
Route::resource('user', UserController::class);


### Inventory
Route::get('/inventory', [App\Http\Controllers\ManagementInventory::class, 'index'])->name('inventory_index');
Route::get('/inventory/details/{id}', [App\Http\Controllers\ManagementInventory::class, 'details'])->name('inventory_details');
Route::get('/inventory/create', [App\Http\Controllers\ManagementInventory::class, 'store_index'])->name('inventory_create');
Route::post('/inventory/create', [App\Http\Controllers\ManagementInventory::class, 'store'])->name('inventory_create_form');
Route::get('/inventory/edit/{id}', [App\Http\Controllers\ManagementInventory::class, 'edit_page'])->name('inventory_edit');
Route::post('/inventory/update/{id}', [App\Http\Controllers\ManagementInventory::class, 'update'])->name('inventory_edit_post');
Route::post('/inventory/delete/{id}', [App\Http\Controllers\ManagementInventory::class, 'delete'])->name('inventory_delete');
Route::post('/inventory/search', [App\Http\Controllers\ManagementInventory::class, 'search'])->name('inventory_search');

### Room
Route::get('/room', [App\Http\Controllers\ManagementRoom::class, 'index'])->name('room_index');
Route::get('/room/details/{id}', [App\Http\Controllers\ManagementRoom::class, 'details'])->name('room_details');
Route::get('/room/create', [App\Http\Controllers\ManagementRoom::class, 'store_index'])->name('room_create');
Route::post('/room/create', [App\Http\Controllers\ManagementRoom::class, 'store'])->name('room_create_form');
Route::get('/room/edit/{id}', [App\Http\Controllers\ManagementRoom::class, 'edit_page'])->name('room_edit');
Route::post('/room/delete/{id}', [App\Http\Controllers\ManagementRoom::class, 'delete'])->name('room_delete');
Route::post('/room/update/{id}', [App\Http\Controllers\ManagementRoom::class, 'update'])->name('room_update');
Route::post('/room/search', [App\Http\Controllers\ManagementRoom::class, 'search'])->name('room_search');

### Room Data
Route::get('/room/add_inventory', [App\Http\Controllers\RoomDataController::class, 'index'])->name('room_index_inventory');
Route::post('/room/add_inventory', [App\Http\Controllers\RoomDataController::class, 'store'])->name('room_store_inventory');
Route::get('/room/inventory/edit/{id}', [App\Http\Controllers\RoomDataController::class, 'update_index'])->name('room_update_inventory_page');
Route::post('/room/inventory/edit', [App\Http\Controllers\RoomDataController::class, 'update'])->name('room_update_inventory');
Route::post('/room/inventory/delete/{id}', [App\Http\Controllers\RoomDataController::class, 'delete'])->name('room_inventory_delete');
});


// test

