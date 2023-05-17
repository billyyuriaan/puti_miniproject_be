<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function (){
    Route::prefix("/mahasiswa")->group(function (){
        Route::get("/", [MahasiswaController::class, "show"]);
        Route::get("/{nim}", [MahasiswaController::class, "showById"]);
        Route::post("/", [MahasiswaController::class, "create"]);
        Route::delete("/{nim}", [MahasiswaController::class, "delete"]);
        Route::put("/", [MahasiswaController::class, "update"]);
    });
    
    Route::prefix("dosen")->group(function (){
        Route::get("/", [DosenController::class, "show"]);
        Route::get("/{nip}", [DosenController::class, "showById"]);
        Route::post("/", [DosenController::class, "create"]);
        Route::delete("/{nip}", [DosenController::class, "delete"]);
        Route::put("/", [DosenController::class, "update"]);
    });
    
    Route::prefix("jadwal")->group(function (){
         
    });
});
