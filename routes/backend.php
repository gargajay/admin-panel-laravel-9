<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'],'prefix' => 'backend'], function()
{

    Route::resources([
        'roles' => RoleController::class
       
    ],
    [
        'except' => ['show'],
    ]);
    
   

    
  
});