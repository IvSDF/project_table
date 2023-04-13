<?php

namespace App\Http\Actions\Project;

use App\Models\Project;


class ProjectStoreActions
{
    public function store($projectStore)
    {
        Project::firstOrCreate([
            'title' => $projectStore['title'],
            'descriptions' => $projectStore['descriptions']
        ]);

    }
}
