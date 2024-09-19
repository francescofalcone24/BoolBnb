<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\VisualController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SuiteController;
//use App\Http\Controllers\Api\LeadController;
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

Route::get('/suite', [SuiteController::class, 'index']);
Route::get('/suite/name/{suite:slug}', [SuiteController::class, 'show']);
Route::get('/suite/search', [SuiteController::class, 'search']);
Route::get('suite/latest', [SuiteController::class, 'latest']);

// Route::get('/suite/searchNow/', [SuiteController::class, 'search']);

Route::post('/pincopallino/{suite:id}', [MessageController::class, 'store']);
// Route::get('/visual', [VisualController::class, 'index']);
Route::post('/visual', [VisualController::class, 'store']);
