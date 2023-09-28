<?php

use App\Http\Controllers\API\TaskApiController;
use Illuminate\Http\Request;
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

Route::get('/tasks', [TaskApiController::class, 'index'])->name('task-list');
Route::prefix('task')->group(function () {
    Route::post('/store', [TaskApiController::class, 'store'])->name('task-create');
    Route::put('/{id}', [TaskApiController::class, 'update'])->name('task-update');
    Route::delete('/{id}', [TaskApiController::class, 'destroy'])->name('task-delete');
});
