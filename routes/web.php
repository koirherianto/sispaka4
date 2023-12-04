<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('landing.index');
});

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('/homx', [App\Http\Controllers\HomeController::class, 'home'])->name('homex');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('editProfile', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('update.password');
    Route::post('updateFotoProfile', [UserController::class, 'updateFotoProfile'])->name('update.foto.profile');
    
    
    Route::resource('users', UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('methods', App\Http\Controllers\MethodController::class);

    Route::post('/changeProject/{id}', [App\Http\Controllers\ProjectController::class, 'changeProject'])->name('changeProject');
    Route::resource('backwardChainings', App\Http\Controllers\BackwardChaining\BackwardChainingController::class);
    Route::resource('bcEvidences', App\Http\Controllers\BackwardChaining\BcEvidenceController::class);
});


