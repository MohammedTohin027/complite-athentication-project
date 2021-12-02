<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;

/**
 *
 */
Trait AdminPermission
{
    public function checkRequestPermission(){
        if (
            //  role
            @empty(auth()->user()->role->permission['permission']['role']['list']) && Route::is('role.index') ||
            @empty(auth()->user()->role->permission['permission']['role']['add']) && Route::is('role.store') ||
            @empty(auth()->user()->role->permission['permission']['role']['edit']) && Route::is('role.edit') ||
            @empty(auth()->user()->role->permission['permission']['role']['update']) && Route::is('role.update') ||
            @empty(auth()->user()->role->permission['permission']['role']['delete']) && Route::is('role.delete') ||
            @empty(auth()->user()->role->permission['permission']['role']['view']) && Route::is('role.index') ||

            //  permission
            @empty(auth()->user()->role->permission['permission']['permission']['list']) && Route::is('permission.index') ||
            @empty(auth()->user()->role->permission['permission']['permission']['add']) && Route::is('permission.create') ||
            @empty(auth()->user()->role->permission['permission']['permission']['add']) && Route::is('permission.store') ||
            @empty(auth()->user()->role->permission['permission']['permission']['edit']) && Route::is('permission.edit') ||
            @empty(auth()->user()->role->permission['permission']['permission']['update']) && Route::is('permission.update') ||
            @empty(auth()->user()->role->permission['permission']['permission']['delete']) && Route::is('permission.delete') ||
            @empty(auth()->user()->role->permission['permission']['permission']['view']) && Route::is('permission.index') ||

            //  subadmin
            @empty(auth()->user()->role->permission['permission']['subadmin']['list']) && Route::is('subadmin.index') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['add']) && Route::is('subadmin.create') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['add']) && Route::is('subadmin.store') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['edit']) && Route::is('subadmin.edit') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['update']) && Route::is('subadmin.update') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['delete']) && Route::is('subadmin.delete') ||
            @empty(auth()->user()->role->permission['permission']['subadmin']['view']) && Route::is('subadmin.index')


        ) {
           return response()->view('admin.home');
        }
    }
}


?>
