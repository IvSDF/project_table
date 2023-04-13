<?php

namespace App\Http\Actions\Project;


class ProjectUpdateActions
{
    public function update($project, $projectUpdate)
    {
        $project->update($projectUpdate);
    }

}
