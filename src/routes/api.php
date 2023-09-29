<?php

use App\Http\Controllers\Api\ApiTaskController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::prefix('tasks')->group(function () {
//    Route::get('/', [ApiTaskController::class, 'index'])->name('tasks.index');
//    Route::post('/', [ApiTaskController::class, 'store'])->name('tasks.store');
//    Route::put('/{task}', [ApiTaskController::class, 'update'])->name('tasks.update');
//    Route::get('/{task}', [ApiTaskController::class, 'show'])->name('tasks.show');
//    Route::delete('/{task}', [ApiTaskController::class, 'destroy'])->name('tasks.destroy');
//});

Route::apiResource('tasks', ApiTaskController::class);
