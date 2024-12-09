<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;

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

// API per l'utente autenticato
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotte API per CRUD
Route::middleware('auth:sanctum')->group(function () {
    // Rotte per utenti
    Route::apiResource('users', UserController::class);

    // Rotte per piscine
    Route::apiResource('pools', PoolController::class);

    // Rotte per ruoli
    Route::apiResource('roles', RoleController::class);

    // Rotte per turni
    Route::apiResource('shifts', ShiftController::class);
});
