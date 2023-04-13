<?php

namespace App\Http\Actions\Task;


class TaskDestroyActions
{
    public function destroy($task)
    {
        $task->delete();
    }
}
