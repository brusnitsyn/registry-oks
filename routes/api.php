<?php

use App\Http\Controllers\Api\v1\LpuController;
use App\Http\Controllers\Api\v1\PacientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return \App\Http\Resources\Auth\UserResource::make($request->user());
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [\App\Http\Controllers\Api\v1\AuthController::class, 'login'])->middleware('guest');
    Route::get('/user', [\App\Http\Controllers\Api\v1\AuthController::class, 'currentUser'])->middleware('auth:sanctum');
});

Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('/', [\App\Http\Controllers\Api\v1\AdminController::class, 'createUser']);
    });
});

Route::prefix('pacient')->group(function () {
    Route::get('/', [PacientController::class, 'index'])->middleware(['auth:sanctum']);
    Route::post('/', [PacientController::class, 'create'])->middleware(['auth:sanctum']);
    Route::prefix('{pacient}')->group(function () {
        Route::get('/', [PacientController::class, 'show'])->middleware(['auth:sanctum']);
        Route::get('/edit', [PacientController::class, 'edit'])->middleware(['auth:sanctum']);
        Route::post('/', [PacientController::class, 'update'])->middleware(['auth:sanctum']);
        Route::delete('/', [PacientController::class, 'delete'])->middleware(['auth:sanctum']);
    });
});

Route::get('/lpu', [LpuController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/mkb', [\App\Http\Controllers\Api\v1\MkbController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/conco-diagnoses', [\App\Http\Controllers\Api\v1\MkbController::class, 'conco'])->middleware(['auth:sanctum']);
Route::get('/complication', [\App\Http\Controllers\Api\v1\MkbController::class, 'complication'])->middleware(['auth:sanctum']);
Route::get('/control-point', [\App\Http\Controllers\Api\v1\ControlPointController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/control-point-result', [\App\Http\Controllers\Api\v1\ControlPointController::class, 'result'])->middleware(['auth:sanctum']);

Route::prefix('disp')->group(function () {
    Route::get('/status', [\App\Http\Controllers\Api\v1\DispController::class, 'index'])->middleware(['auth:sanctum']);
    Route::get('/result-call', [\App\Http\Controllers\Api\v1\DispController::class, 'resultCall'])->middleware(['auth:sanctum']);
});

Route::prefix('lek-pr-state')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\v1\LekPrStateController::class, 'index'])->middleware(['auth:sanctum']);
});

Route::prefix('disp-dop-health')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\v1\DispDopHealthController::class, 'index'])->middleware(['auth:sanctum']);
});

Route::prefix('control-point')->group(function () {
    Route::prefix('{controlPoint}')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\v1\ControlPointController::class, 'get'])->middleware(['auth:sanctum']);
        Route::put('/', [\App\Http\Controllers\Api\v1\ControlPointController::class, 'update'])->middleware(['auth:sanctum']);
    });
});
