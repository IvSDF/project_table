<?php

namespace App\Http\Actions\Project;


class ProjectDestroyActions
{
    public function destroy($project)
    {
        $project->delete();
    }
}
