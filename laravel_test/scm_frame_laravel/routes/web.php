<?php

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'showTask'])->name('task.show');
Route::post('/task', [TaskController::class, 'createTask'])->name('task.create');
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'], )->name('task.delete');
