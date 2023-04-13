<?php

namespace App\Http\Actions\Task;



class TaskUpdateActions
{
    public function update($task, $taskUpdate)
    {
        if(request('file')){
            $file = request()->file('file')->store('files');
            $taskUpdate['file'] = $file;
        }

        $task->update($taskUpdate);
    }
}
