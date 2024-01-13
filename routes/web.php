<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [App\Http\Controllers\LandingController::class, 'index']);
Route::get('/blogs', [App\Http\Controllers\LandingController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [App\Http\Controllers\LandingController::class, 'blog'])->name('blog');
Route::post('bc/selectEvidences', [App\Http\Controllers\LandingController::class, 'selectEvidences'])->name('bc.selectEvidences');
Route::post('bc/result', [App\Http\Controllers\LandingController::class, 'result'])->name('bc.result');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// peringatan : jangan jalankan ini di local
Route::get('storage-link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
    echo 'Symlink process successfully completed';
});

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
    Route::get('/projects/publish', [App\Http\Controllers\ProjectController::class, 'publish'])->name('projects.publish');
    Route::get('/projects/unpublish', [App\Http\Controllers\ProjectController::class, 'unpublish'])->name('projects.unpublish');
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('methods', App\Http\Controllers\MethodController::class);
    Route::get('/contributors/refresh', [App\Http\Controllers\ContributorController::class, 'refresh'])->name('contributors.refresh');
    Route::resource('contributors', App\Http\Controllers\ContributorController::class);

    Route::post('/changeProject/{id}', [App\Http\Controllers\ProjectController::class, 'changeProject'])->name('changeProject');
    Route::post('/unmanageProject/{id}', [App\Http\Controllers\ProjectController::class, 'unmanageProject'])->name('unmanageProject');
    Route::group(['middleware' => ['ProjectSessionExist']], function () {
        Route::resource('backwardChainings', App\Http\Controllers\BackwardChaining\BackwardChainingController::class);
        Route::resource('bcEvidences', App\Http\Controllers\BackwardChaining\BcEvidenceController::class);
        Route::resource('bcGoals', App\Http\Controllers\BackwardChaining\BcGoalController::class);
        Route::resource('bcRules', App\Http\Controllers\BackwardChaining\BcRuleController::class);
        Route::resource('bcRuleCodes', App\Http\Controllers\BackwardChaining\BcRuleCodeController::class);
        Route::get('bcTry/selectGoals', [App\Http\Controllers\BackwardChaining\BackwardChaningTryController::class, 'selectGoals'])->name('bcTry.selectGoals');
        Route::post('bcTry/selectEvidences', [App\Http\Controllers\BackwardChaining\BackwardChaningTryController::class, 'selectEvidences'])->name('bcTry.selectEvidences');
        Route::post('bcTry/result', [App\Http\Controllers\BackwardChaining\BackwardChaningTryController::class, 'result'])->name('bcTry.result');
    });

    Route::resource('forwardChainings', App\Http\Controllers\ForwardChaining\ForwardChainingController::class);
    Route::resource('fcGoals', App\Http\Controllers\ForwardChaining\FcGoalController::class);
    Route::resource('fcEvidences', App\Http\Controllers\ForwardChaining\FcEvidenceController::class);
    Route::resource('fcRuleGroups', App\Http\Controllers\ForwardChaining\FcRuleGroupController::class);
});