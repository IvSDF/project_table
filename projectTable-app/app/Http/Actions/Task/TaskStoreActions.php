<?php

namespace App\Http\Actions\Task;


use App\Models\Task;



class TaskStoreActions
{
    public function store($task)
    {
        if(request('file')){
            $file = request()->file('file')->store('files');
            $task['file'] = $file;
        }

        Task::firstOrCreate($task);
    }

}
