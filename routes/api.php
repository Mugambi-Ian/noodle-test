<?php

use App\Http\Controllers\PyramidController;
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



Route::prefix('v1/pyramid')->group(function () {


    Route::post('/', [PyramidController::class,'post']);
    Route::put('/{pyramidID}', [PyramidController::class,'put']);
    Route::delete('/{pyramidID}',[PyramidController::class,'delete']);


    Route::get('/',[PyramidController::class,'getBySearchParams']);
    Route::get('/{pyramidID}', [PyramidController::class,'getById']);
});
