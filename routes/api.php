<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomController;
use App\Http\Controllers\BreakdownController;

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

Route::get('/random', [RandomController::class, 'index']);
Route::get('/breakdown', [BreakdownController::class, 'index']);
Route::post('/store/random', [RandomController::class, 'store']);
Route::post('/store/breakdown', [BreakdownController::class, 'store']);
Route::delete('/delete/random', [RandomController::class, 'destroy']);
Route::delete('/delete/breakdown', [BreakdownController::class, 'destroy']);