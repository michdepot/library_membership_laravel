<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth:sanctum', 'verifyemail'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('authors', AuthController::class);

    Route::post('createcard', [CardController::class, 'createCard']);
    Route::get('cards/{id}', [CardController::class, 'showCard']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::put('verify/{id}', [AuthController::class, 'verify']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [UserController::class, 'store']);

