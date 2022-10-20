<?php

use App\Http\Controllers\Api\MajorApiController;
use App\Http\Controllers\Api\StudentApiController;
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

// Majors
Route::get('/majors', [MajorApiController::class, 'index'])->name('api.major.index');
Route::post('/majors/store', [MajorApiController::class, 'store']);
Route::get('/majors/edit/{id}', [MajorApiController::class, 'edit']);
Route::put('/majors/edit/{id}', [MajorApiController::class, 'update']);
Route::delete('/majors/delete/{id}', [MajorApiController::class, 'delete']);
Route::get('/majors/pagination/paginate-data/', [MajorApiController::class, 'pagination']);

// Students
Route::get('/students', [StudentApiController::class, 'index'])->name('api.student.index');
Route::get('/students/create', [StudentApiController::class, 'create']);
Route::post('/students/create', [StudentApiController::class, 'store']);
Route::get('/students/edit/{id}', [StudentApiController::class, 'edit']);
Route::put('/students/edit/{id}', [StudentApiController::class, 'update']);
Route::delete('/students/delete/{id}', [StudentApiController::class, 'delete']);
Route::get('/students/pagination/paginate-data/', [StudentApiController::class, 'pagination']);
