<?php

namespace App\Http\Controllers;


use App\Http\Actions\Task\TaskDestroyActions;
use App\Http\Actions\Task\TaskStatusActions;
use App\Http\Actions\Task\TaskStoreActions;
use App\Http\Actions\Task\TaskUpdateActions;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{
    public function show( Task $task )
    {
        return view('task.show', ['task' => $task]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store( TaskStoreRequest $taskStoreRequest, TaskStoreActions $taskStoreActions )
    {
        $task = $taskStoreRequest->validated();
        $task['project_id'] = request()->session()->get('project_id');

        $taskStoreActions->store($task);

        return redirect()->route('project.show', ['project' => $task['project_id']]);
    }

    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    public function update( Task $task, TaskUpdateRequest $taskUpdateRequest, TaskUpdateActions $taskUpdateActions )
    {
        $taskUpdate = $taskUpdateRequest->validated();

        $taskUpdateActions->update($task, $taskUpdate);

        return redirect()->route('task.show', ['task' => $task]);
    }

    public function destroy( Task $task, TaskDestroyActions $taskDestroyActions )
    {
        $taskDestroyActions->destroy($task);

        $project = request()->session()->get('project_id');

        return redirect()->route('project.show', ['project' => $project]);
    }

    public function download( Task $task )
    {
        $file = $task->file;
        return Storage::download($file);
    }

    public function status( Task $task, Request $request, TaskStatusActions $taskStatusActions )
    {
        $taskStatusActions->status($task, $request);

        return back();
    }
}
