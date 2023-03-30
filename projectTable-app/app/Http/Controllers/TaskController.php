<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskStoreRequest $taskStoreRequest)
    {
        $task = $taskStoreRequest->validated();
        $task['project_id'] = request()->session()->get('project_id');

        if(request('file')){
            $file = request()->file('file')->store('files');
            $task['file'] = $file;
        }

        Task::firstOrCreate($task);

        return redirect()->route('project.show', ['project' => $task['project_id']]);
    }

    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    public function update(Task $task, TaskUpdateRequest $taskUpdateRequest)
    {
        $taskUpdate = $taskUpdateRequest->validated();

        if(request('file')){
            $file = request()->file('file')->store('files');
            $taskUpdate['file'] = $file;
        }

        $task->update($taskUpdate);

        return redirect()->route('task.show', ['task' => $task]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        $project = request()->session()->get('project_id');

        return redirect()->route('project.show', ['project' => $project]);
    }

    public function download(Task $task)
    {
        $file = $task->file;
        return Storage::download($file);
    }

    public function status(Task $task, Request $request)
    {
        $status = $request->status;
        $task->update(['status' => $status]);

        return back();
    }
}
