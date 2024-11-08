<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/teams', [App\Http\Controllers\API\TeamAPIController::class, 'index'])->name('teams.index');
    Route::post('/teams', [App\Http\Controllers\API\TeamAPIController::class, 'store'])->name('teams.store');
    Route::get('/teams/{id}', [App\Http\Controllers\API\TeamAPIController::class, 'show'])->name('teams.show');
    Route::put('/teams/{id}', [App\Http\Controllers\API\TeamAPIController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [App\Http\Controllers\API\TeamAPIController::class, 'destroy'])->name('teams.destroy');

    Route::get('/fetch-teams', [App\Http\Controllers\API\TeamAPIController::class, 'fetchTeams'])->name('teams.fetchTeams');
});
