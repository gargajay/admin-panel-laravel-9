<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'],'prefix' => 'backend'], function()
{

    Route::resources([
        'role' => RoleController::class
       
    ],
    [
        'except' => ['show'],
    ]);

    Route::get('role/status/{id}/{status}', [RoleController::class, 'status']);
    Route::post('role/bulk-delete', [RoleController::class, 'bulkDelete']);

    
   

    
  
});