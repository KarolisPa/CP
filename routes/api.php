<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::post('/add', [EventController::class, 'store']);
    Route::get('/{id}', [EventController::class, 'show']);
    Route::put('/{id}', [EventController::class, 'edit']);
    Route::delete('/{id}/delete', [EventController::class, "destroy"]);
});
Route::prefix('/organizers')->group(function () {
    Route::get('/', [OrganizerController::class, 'index']);
    Route::post('/add', [OrganizerController::class, 'store']);
    Route::get('/{id}', [OrganizerController::class, 'show']);
    Route::post('/{id}', [OrganizerController::class, 'edit']);
    Route::delete('/{id}/delete', [OrganizerController::class, "destroy"]);
});
