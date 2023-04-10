<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProjectController extends Controller
{
    public function show(Project $project, Request $request)
    {
        request()->session()->put(['project_id' => $project->id]);
        if($request->get('status')){
            $status = $request->input('status');
            $tasks = DB::table('tasks')->where('status', '=', $status)->get();
            return view('project.show', [ 'project' => $project,  'tasks' => $tasks]);
        }else
            $tasks = Task::all();
            return view('project.show', [ 'project' => $project, 'tasks' => $tasks, 'task']);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $projectStoreRequest)
    {
        $project = $projectStoreRequest->validated();

        Project::firstOrCreate([
            'title' => $project['title'],
            'descriptions' => $project['descriptions']
        ]);

        return redirect()->route('home');
    }

    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    public function update(Project $project, ProjectUpdateRequest $projectUpdateRequest)
    {
        $projectUpdate = $projectUpdateRequest->validated();
        $project->update($projectUpdate);

        return redirect()->route('project.show', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('home');
    }
}
