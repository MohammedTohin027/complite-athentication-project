<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

//   Admin Route
Route::group(['prefix' => 'admin', 'middleware' =>['admin', 'auth', 'permission'] ], function(){
    Route::get('dashbard', [AdminController::class, 'index'])->name('admin.dashboard');

    //  Profile Route
    Route::prefix('profile')->group(function () {
        Route::get('view', [AdminController::class, 'viewProfile'])->name('view.profile');
        Route::post('update-ifno', [AdminController::class, 'updateProfileInfo'])->name('admin.update.profile-info');
        Route::get('update-image', [AdminController::class, 'changeImage'])->name('admin.change.image');
        Route::post('update-image', [AdminController::class, 'updateImage'])->name('admin.update.image');
        Route::get('update-password', [AdminController::class, 'changePassword'])->name('admin.change.password');
        Route::post('update-password', [AdminController::class, 'updatePassword'])->name('admin.update.password');
    });



    //  Role Route
    Route::prefix('role')->group(function () {
        Route::get('view', [RoleController::class, 'index'])->name('role.index');
        Route::post('store', [RoleController::class, 'store'])->name('role.store');
        Route::get('update/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });

    //  Permission Route
    Route::prefix('permission')->group(function () {
        Route::get('view', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('update/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::put('update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    });

    //  Subadmin Route
    Route::prefix('subadmin')->group(function () {
        Route::get('view', [SubAdminController::class, 'index'])->name('subadmin.index');
        Route::post('store', [SubAdminController::class, 'store'])->name('subadmin.store');
        Route::get('update/{id}', [SubAdminController::class, 'edit'])->name('subadmin.edit');
        Route::put('update/{id}', [SubAdminController::class, 'update'])->name('subadmin.update');
        Route::get('delete/{id}', [SubAdminController::class, 'delete'])->name('subadmin.delete');
    });

    Route::get('all/user', [AdminController::class, 'allUser'])->name('all.user.view');
    Route::get('user/banned/{id}', [AdminController::class, 'userBanned'])->name('user.banned');
    Route::get('user/unbanned/{id}', [AdminController::class, 'userUnbanned'])->name('user.unbanned');

});

//    ==============================   Socialite Route   ==================================
//   Google Route
    Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [LoginController::class, 'callbackToGoogle']);
//   Facebook Route
    Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [LoginController::class, 'callbackToFacebook']);


    
//   User Route
Route::group(['prefix' => 'user', 'middleware' =>['user', 'auth'] ], function(){
    Route::get('dashbard', [UserController::class, 'index'])->name('user.dashboard');

    //  Profile Route
    Route::prefix('profile')->group(function () {
        Route::post('update-info', [UserController::class, 'updateProfile'])->name('update.profile');
        Route::get('update-image', [UserController::class, 'changeImage'])->name('change.image');
        Route::post('update-image', [UserController::class, 'updateImage'])->name('update.image');
        Route::get('update-password', [UserController::class, 'changePassword'])->name('change.password');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('update.password');
    });

});