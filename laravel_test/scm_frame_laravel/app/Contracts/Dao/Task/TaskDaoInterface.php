<?php
namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

interface TaskDaoInterface
{
    /**
     * To get all tasks
     * @return Object $task to get all task
     */
    public function getTasks();

    /**
     * To store task
     * @param Request $request request with inputs
     * @return Object $task to store task
     */
    public function storeTask(Request $request);

    /**
     * To delete task
     */
    public function deleteTask($id);
}
