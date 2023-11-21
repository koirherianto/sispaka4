<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/homx', [App\Http\Controllers\HomeController::class, 'home'])->name('homex');

Auth::routes();




Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('editProfile', [App\Http\Controllers\UserController::class, 'editProfile'])->name('edit.profile');
Route::post('updateProfile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('update.profile');
Route::post('updatePassword', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update.password');
Route::resource('coys', App\Http\Controllers\CoyController::class);
Route::resource('kucings', App\Http\Controllers\KucingController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


