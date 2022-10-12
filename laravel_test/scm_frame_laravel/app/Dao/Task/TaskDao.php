<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface
{

    /**
     * To get all tasks
     * @return Object $task to get all task
     */
    public function getTasks()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return $tasks;
    }

    /**
     * To store task
     * @param Request $request request with inputs
     * @return Object $task to store task
     */
    public function storeTask(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return $task;
    }

    /**
     * To delete task
     */
    public function deleteTask($id)
    {
        Task::findOrFail($id)->delete();
    }
}
