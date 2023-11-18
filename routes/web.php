<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware(['web', 'auth']);
Route::resource('admin/cars', App\Http\Controllers\carController::class)->middleware(['web', 'auth'])->middleware(AdminOnly::class);
Route::resource('admin/rents', App\Http\Controllers\RentController::class)->middleware(['web', 'auth'])->middleware(['web', 'auth']);
Route::post('admin/cars/stores', [App\Http\Controllers\carController::class, 'store'])->name('cars.stores')->middleware(['web', 'auth', AdminOnly::class]);
Route::post('admin/cars/{car}/updates', [App\Http\Controllers\carController::class, 'update'])->name('cars.updates')->middleware(['web', 'auth', AdminOnly::class]);
Route::get('admin/cars/{car}/delete', [App\Http\Controllers\carController::class, 'destroy'])->name('cars.delete')->middleware(['web', 'auth', AdminOnly::class]);
Route::get('sewa-mobil', [App\Http\Controllers\carController::class, 'sewa'])->name('sewa')->middleware(['web', 'auth']);
Route::get('sewa-mobil/{car}/rent', [App\Http\Controllers\carController::class, 'rentcar'])->name('cars.rentcar')->middleware(['web', 'auth']);
Route::post('sewa-mobil/{car}/rent-submit', [App\Http\Controllers\carController::class, 'rentcarsubmit'])->name('cars.rentcarsubmit')->middleware(['web', 'auth']);
Route::get('rents/{book}/delete', [App\Http\Controllers\RentController::class, 'destroy'])->name('rents.delete')->middleware(['web', 'auth']);
