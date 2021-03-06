<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->group(function() {
//     Route::prefix('users')->group(function() {
//         Route::get('/' , 'UserController@index');
//     });
// });

Route::get('/users' , [UserController::class , 'index']);
Route::post('/users' , [UserController::class , 'store']);
Route::delete('/users/{id}', [UserController::class , 'delete']);
Route::put('/users/{id}', [UserController::class , 'update']);