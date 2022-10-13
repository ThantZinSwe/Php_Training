<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/create', [StudentController::class, 'createStudent'])->name('student.create');
Route::post('/students/create', [StudentController::class, 'storeStudent'])->name('student.store');
Route::get('/students/edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
Route::put('/students/edit/{id}', [StudentController::class, 'updateStudent'])->name('student.update');
Route::delete('/students/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
Route::get('/majors/create', [MajorController::class, 'createMajor'])->name('major.create');
Route::post('/majors/create', [MajorController::class, 'storeMajor'])->name('major.store');
Route::get('/majors/edit/{id}', [MajorController::class, 'editMajor'])->name('major.edit');
Route::put('/majors/edit/{id}', [MajorController::class, 'updateMajor'])->name('major.update');
Route::delete('/majors/{id}', [MajorController::class, 'deleteMajor'])->name('major.delete');

Route::get('/task', [TaskController::class, 'showTask'])->name('task.show');
Route::post('/create/task', [TaskController::class, 'createTask'])->name('task.create');
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'])->name('task.delete');
