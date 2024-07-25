<?php

use App\Http\Controllers\API\ChecklistController;
use App\Http\Controllers\API\ItemTodoChecklistController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', RegisterController::class)->name('register');

Route::middleware('auth:api')->group(function() {
    Route::apiResource('checklist', ChecklistController::class);
    Route::apiResource('item-checklist', ItemTodoChecklistController::class);
});