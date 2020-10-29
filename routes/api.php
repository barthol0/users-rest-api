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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List users
Route::get('users', [UserController::class, 'index']);

// List single user
Route::get('user/{id}', [UserController::class, 'show']);

// Create new user;
Route::post('user', [UserController::class, 'store']);

// Update user
Route::put('user', [UserController::class, 'store']);

// Delete user
Route::delete('user/{id}', [UserController::class, 'destroy']);
