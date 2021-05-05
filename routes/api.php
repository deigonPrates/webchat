<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('users', [UsersController::class, 'index'])->name('users.list');
    Route::get('users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('messages/{user}', [MessageController::class, 'listMessages'])->name('message.listMessages');
});
