<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\MovementtypesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//127.0.0.1:8000/api/v1/inventory/

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'inventory'], function () {
        //Rutas auth
        Route::group(['prefix' => 'auth'], function ($router) {
            Route::post('login', [AuthController::class, 'login']);
            Route::post('register', [AuthController::class, 'register']);
            Route::post('logout', [AuthController::class, 'logout']);
        });

        //profiles
        Route::group([
            'prefix' => 'profile'
        ], function ($router) {
            Route::get('', [ProfileController::class, 'index']);
        });

        //users
        Route::group([
            'prefix' => 'user'
        ], function ($router) {
            Route::get('', [UserController::class, 'index'])->middleware(['auth:api', 'scopes:administrador']);
            Route::get('/{id}', [UserController::class, 'showEnable']);
        });

        //category
        Route::group([
            'prefix' => 'category'
        ], function ($router) {
            Route::get('', [CategoryController::class, 'index']);
            Route::get('/{id}', [CategoryController::class, 'show']);
        });

        //contact
        Route::group([
            'prefix' => 'contact'
        ], function ($router) {
            Route::get('', [ContactController::class, 'index']);
            Route::get('/{id}', [ContactController::class, 'show']);
        });

        //display
        Route::group([
            'prefix' => 'display'
        ], function ($router) {
            Route::get('', [DisplayController::class, 'index']);
            Route::get('/{id}', [DisplayController::class, 'show']);
        });

        //location
        Route::group([
            'prefix' => 'location'
        ], function ($router) {
            Route::get('', [LocationController::class, 'index']);
            Route::get('/{id}', [LocationController::class, 'show']);
        });

        //movementtype
        Route::group([
            'prefix' => 'movementtype'
        ], function ($router) {
            Route::get('', [MovementtypesController::class, 'index']);
            Route::get('/{id}', [MovementtypesController::class, 'show']);
        });

        //movement
        Route::group([
            'prefix' => 'movement'
        ], function ($router) {
            Route::get('', [MovementController::class, 'index']);
            Route::get('/{id}', [MovementController::class, 'show']);
        });

        //supplier
        Route::group([
            'prefix' => 'supplier'
        ], function ($router) {
            Route::get('', [SupplierController::class, 'index']);
            Route::get('/{id}', [SupplierController::class, 'show']);
        });

        //product
        Route::group([
            'prefix' => 'product'
        ], function ($router) {
            Route::get('', [ProductController::class, 'index']);
            Route::get('/{id}', [ProductController::class, 'showEnable']);
        });

        //inventory
        Route::get('', [InventoryController::class, 'index']);
        Route::get('/{id}', [InventoryController::class, 'show']);


    }); //end group inventory

});//end group v1
