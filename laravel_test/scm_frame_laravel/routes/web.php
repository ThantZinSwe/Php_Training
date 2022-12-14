<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [PageController::class, 'index'])->name('index');

//student route
Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/create', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/edit/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/students/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::get('/students/export', [StudentController::class, 'export'])->name('student.exprot');
Route::post('/students/import', [StudentController::class, 'import'])->name('student.import');
Route::get('/students/search', [StudentController::class, 'search'])->name('student.search');

//major route
Route::get('/majors', [MajorController::class, 'index'])->name('major.index');
Route::get('/majors/create', [MajorController::class, 'create'])->name('major.create');
Route::post('/majors/create', [MajorController::class, 'store'])->name('major.store');
Route::get('/majors/edit/{id}', [MajorController::class, 'edit'])->name('major.edit');
Route::put('/majors/edit/{id}', [MajorController::class, 'update'])->name('major.update');
Route::delete('/majors/{id}', [MajorController::class, 'delete'])->name('major.delete');

Route::get('/task', [TaskController::class, 'showTask'])->name('task.show');
Route::post('/create/task', [TaskController::class, 'createTask'])->name('task.create');
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'])->name('task.delete');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
