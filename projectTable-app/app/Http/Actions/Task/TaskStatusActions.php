<?php

namespace App\Http\Actions\Task;

class TaskStatusActions
{
    public function status($task, $request)
    {
        $status = $request->status;
        $task->update(['status' => $status]);

        return back();
    }
}
