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
            Route::get('', [ProfileController::class, 'index']);//->middleware(['auth:api']);
        });

        //users
        Route::group([
            'prefix' => 'user'
        ], function ($router) {
            Route::get('', [UserController::class, 'index']);
            Route::get('allDisable', [UserController::class, 'allDisable']);
            Route::get('requests', [UserController::class, 'requests']);
            Route::patch('update/{id}', [UserController::class, 'update']);
            Route::patch('updateAdmin/{id}',[UserController::class, 'updateAdmin']);
            Route::get('showSolicitud/{id}', [UserController::class, 'showSolicitud']);
            Route::get('/{id}', [UserController::class, 'showEnable']);
            Route::get('showDisable/{id}', [UserController::class, 'showDisable']);


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
            Route::get('', [LocationController::class, 'index'])/*->middleware(['auth:api'])*/;
            Route::get('showLocation', [LocationController::class, 'showLocation']);
            Route::get('/{id}', [LocationController::class, 'show'])/*->middleware(['auth:api'])*/;

          //  Route::get('location', [LocationController::class, 'Location'])
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
            Route::get('', [MovementController::class, 'index'])->middleware(['auth:api']);
            Route::get('/{id}', [MovementController::class, 'show'])->middleware(['auth:api']);
        });

        //supplier
        Route::group([
            'prefix' => 'supplier'
        ], function ($router) {
            Route::get('', [SupplierController::class, 'index'])->middleware(['auth:api']);
            Route::post('', [SupplierController::class, 'store'])->middleware(['auth:api']);
            Route::get('/{id}', [SupplierController::class, 'show'])->middleware(['auth:api']);
            Route::patch('/{id}', [SupplierController::class, 'update'])->middleware(['auth:api', 'scopes:administrador']);
        });

        //product
        Route::group([
            'prefix' => 'product'
        ], function ($router) {
            Route::get('', [ProductController::class, 'index'])->middleware(['auth:api']);
            Route::post('', [ProductController::class, 'store'])->middleware(['auth:api']);
            Route::get('all', [ProductController::class, 'all']);
            Route::get('reposicion', [ProductController::class, 'reposicion']);
            Route::get('total', [ProductController::class, 'total']);
            Route::patch('/{id}', [ProductController::class, 'update'])->middleware(['auth:api']);
            Route::get('/{id}', [ProductController::class, 'show']);
            Route::get('showProduct/{id}',[ProductController::class, 'showProduct']);
            Route::patch('updatetests/{id}', [ProductController::class, 'updatetests']);

        });

        //inventory
        Route::get('', [InventoryController::class, 'index'])/*->middleware(['auth:api'])*/;
        Route::get('entradas', [InventoryController::class, 'entradas'])/*->middleware(['auth:api'])*/;
        Route::get('salidas', [InventoryController::class, 'salidas'])/*->middleware(['auth:api'])*/;
        Route::get('totalEntrada', [InventoryController::class, 'totalEntrada']);
        Route::get('totalSalida', [InventoryController::class, 'totalSalida']);
        Route::get('/{id}', [InventoryController::class, 'show'])/*->middleware(['auth:api'])*/;
    }); //end group inventory

});//end group v1
