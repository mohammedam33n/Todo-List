<?php

namespace App\Http\Controllers\Todo;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Events\Todo\TaskCreated;
use App\Events\Todo\TaskRemoved;
use App\Events\Todo\TaskUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTask;
use App\Http\Requests\Todo\updateTask;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Response;

class TasksController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::orderBy('id', 'desc')->paginate(10),
            'status' => Task::TASKSTATUS,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        Task::create($request->validated());
        return response(['message' => 'Task added successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return Response::json($task);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateTask $request, Task $task)
    {
        $task->update($request->validated());
        return response(['message' => 'Task updateed successfully']);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response(['message' => 'Task deleted successfully']);
        // toastr()->success('Have fun storming the castle!', 'Miracle Max Says');


    }
}
