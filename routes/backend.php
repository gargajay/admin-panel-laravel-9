<?php

use App\Http\Controllers\LabController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestCategoryController;
use App\Models\TestCategory;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'],'prefix' => 'backend'], function()
{

    //roles route

    Route::resources([
        'role' => RoleController::class
    ],
    [
        'except' => ['show'],
    ]);
    Route::get('role/status/{id}/{status}', [RoleController::class, 'status']);
    Route::post('role/bulk-delete', [RoleController::class, 'bulkDelete']);


     //roles permission

     Route::resources([
        'permission' => PermissionController::class
    ],
    [
        'except' => ['show'],
    ]);
    Route::get('permission/status/{id}/{status}', [PermissionController::class, 'status']);
    Route::post('permission/bulk-delete', [PermissionController::class, 'bulkDelete']);

      //Use permission

      Route::resources([
        'user' => UserController::class
    ],
    [
        'except' => ['show'],
    ]);
    Route::get('user/status/{id}/{status}', [UserController::class, 'status']);
    Route::post('user/bulk-delete', [UserController::class, 'bulkDelete']);
    Route::get('user/profile', [UserController::class, 'myProfile']);


    //Use Labs

    Route::resources([
        'lab' => LabController::class
    ],
    [
        'except' => ['show'],
    ]);
    Route::get('lab/status/{id}/{status}', [LabController::class, 'status']);
    Route::post('lab/bulk-delete', [LabController::class, 'bulkDelete']);

     //Use test category

     Route::resources([
        'testCategory' => TestCategoryController::class
    ],
    [
        'except' => ['show'],
    ]);
    Route::get('testCategory/status/{id}/{status}', [TestCategoryController::class, 'status']);
    Route::post('testCategory/bulk-delete', [TestCategoryController::class, 'bulkDelete']);    



    

    
   

    
  
});