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
use App\Http\Controllers\InventoryProductController;
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
            Route::get('', [ProfileController::class, 'index'])->middleware(['auth:api']);
        });

        //users
        Route::group([
            'prefix' => 'user'
        ], function ($router) {
            Route::get('', [UserController::class, 'index'])->middleware(['auth:api', 'scopes:administrador, encargado']);
            Route::get('/{id}', [UserController::class, 'showEnable'])->middleware(['auth:api']);
        });

        //category
        Route::group([
            'prefix' => 'category'
        ], function ($router) {
            Route::get('', [CategoryController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [CategoryController::class, 'show'])->middleware(['auth:api']);
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
            Route::get('', [DisplayController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [DisplayController::class, 'show'])->middleware(['auth:api']);
        });

        //location
        Route::group([
            'prefix' => 'location'
        ], function ($router) {
            Route::get('', [LocationController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [LocationController::class, 'show'])->middleware(['auth:api']);
        });

        //movementtype
        Route::group([
            'prefix' => 'movementtype'
        ], function ($router) {
            Route::get('', [MovementtypesController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [MovementtypesController::class, 'show'])->middleware(['auth:api']);
        });

        //movement
        Route::group([
            'prefix' => 'movement'
        ], function ($router) {
            Route::get('', [MovementController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [MovementController::class, 'show'])->middleware(['auth:api']);
        });

        //supplier
        Route::group([
            'prefix' => 'supplier'
        ], function ($router) {
            Route::get('', [SupplierController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [SupplierController::class, 'show'])->middleware(['auth:api']);
        });

        //product
        Route::group([
            'prefix' => 'product'
        ], function ($router) {
            Route::get('', [ProductController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [ProductController::class, 'showEnable']);
        });

        //inventory
        Route::get('', [InventoryController::class, 'index'])->middleware(['auth:api']);
        Route::get('/{id}', [InventoryController::class, 'show'])->middleware(['auth:api']);
    }); //end group inventory

});//end group v1
