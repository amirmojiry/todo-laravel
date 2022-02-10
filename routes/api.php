<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\ApiAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('v1/')->group(function() {

    Route::post('signin', [ApiAuthController::class, 'signin']);

    Route::post('signup', [ApiAuthController::class, 'signup']);

    Route::middleware('auth')->group(function()
    {
        Route::get('todos', [TodoController::class, 'index']);

        Route::post('todos', [TodoController::class, 'store']);
    
        Route::put('todos/{todo}', [TodoController::class, 'update']);
    
        Route::delete('todos/{todo}', [TodoController::class, 'destroy']);
    });
});