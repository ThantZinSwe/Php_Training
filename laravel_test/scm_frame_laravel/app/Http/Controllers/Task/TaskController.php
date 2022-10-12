<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * taskInterface
     */
    private $taskInterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(TaskDaoInterface $taskDaoInterface)
    {
        $this->taskInterface = $taskDaoInterface;
    }

    /**
     * Show Task Dashboard
     * @return View task dashboard
     * @return Object $tasks all tasks
     */
    public function showTask()
    {
        $tasks = $this->taskInterface->getTasks();
        return view('task', compact('tasks'));
    }

    /**
     * To check task and redirect back
     * @param TaskCreateRequest $request Request form task create
     * @return View task dashboard
     */
    public function createTask(TaskCreateRequest $request)
    {
        $task = $this->taskInterface->storeTask($request);
        return redirect()->route('task.show');
    }

    /**
     * To delete task
     * @param Task $task to delete
     * @return View task dashboard
     */
    public function deleteTask(Task $task)
    {
        $this->taskInterface->deleteTask($task->id);
        return redirect()->route('task.show');
    }
}
