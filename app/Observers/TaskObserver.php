<?php

namespace App\Observers;

use App\Models\Task;
use App\Events\Todo\TaskRemoved;
use App\Events\Todo\TaskUpdated;
use App\Events\Todo\TaskCreated;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        broadcast(new TaskCreated($task));
    }

    /**
     * Handle the Task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        broadcast(new TaskUpdated($task));
    }

    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        broadcast(new TaskRemoved($task->id));
    }

}
