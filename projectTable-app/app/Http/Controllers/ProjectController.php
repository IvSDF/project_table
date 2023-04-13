<?php

namespace App\Http\Controllers;

use App\Http\Actions\Project\ProjectDestroyActions;
use App\Http\Actions\Project\ProjectStoreActions;
use App\Http\Actions\Project\ProjectUpdateActions;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function show( Project $project, Request $request )
    {
        $request->session()->put(['project_id' => $project->id]);

        if($request->get('status')){
            $status = $_GET['status'];
            $tasks = DB::table('tasks')->where('status', '=', $status)->get();
            return view('project.show', [ 'project' => $project,  'tasks' => $tasks]);
        }else{
            $tasks = Task::all();
            return view('project.show', [ 'project' => $project,  'tasks' => $tasks]);
        }
    }

    public function create()
    {
        return view('project.create');
    }

    public function store( ProjectStoreRequest $projectStoreRequest, ProjectStoreActions $projectStoreActions )
    {
        $projectStore = $projectStoreRequest->validated();

        $projectStoreActions->store($projectStore);

        return redirect()->route('home');
    }

    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    public function update( Project $project,
                            ProjectUpdateRequest $projectUpdateRequest, ProjectUpdateActions $projectUpdateActions )
    {
        $projectUpdate = $projectUpdateRequest->validated();

        $projectUpdateActions->update($project, $projectUpdate);

        return redirect()->route('project.show', ['project' => $project]);
    }

    public function destroy( Project $project, ProjectDestroyActions $projectDestroyActions )
    {
        $projectDestroyActions->destroy($project);

        return redirect()->route('home');
    }
}
