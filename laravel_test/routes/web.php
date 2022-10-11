<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/**
 * Show Task Dashoboard
 */
Route::get('/', function () {
    $tasks = Task::orderBy('id', 'desc')->get();
    return view('task', ['tasks' => $tasks]);
});

/**
 * Create New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task();
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});
