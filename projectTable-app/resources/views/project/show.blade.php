@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Project</h1>
        <div class="row justify-content-center">
            <div class="col-md-9 mt-3">
                <div class="card">

                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $project->title }}
                        </h2>
                        <h6>
                            {{ $project->descriptions }}
                        </h6>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mr-2">
                        <div class="mt-2 mr-2">
                            <a href="#">
                                <button type="button" class="btn btn-outline-warning">Edit</button>
                            </a>
                        </div>
                        <div class="mt-2">
                            <form method="post" action="{{ route( 'project.destroy', $project->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <formo>
                        <a href="{{ route( 'task.create', $project->id ) }}">
                            <button type="button" class="btn btn-outline-primary">+ Add New Task</button>
                        </a>
                    </formo>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="d-md-flex justify-content-center">
                        <a href="{{ route( 'project.show', $project->id) }}">
                            <button type="submit" class="btn btn-link">All</button>
                        </a>

                        <form method="get" action="{{ route( 'project.show', $project->id) }}">
                            <input type="hidden" id="status" name="status" value="new">
                            <button type="submit" class="btn btn-link">New</button>
                        </form>

                        <form method="get" action="{{ route( 'project.show', $project->id) }}">
                            <input type="hidden" id="status" name="status" value="progress">
                            <button type="submit" class="btn btn-link">Progress</button>
                        </form>

                        <form method="get" action="{{ route( 'project.show', $project->id) }}">
                            <input type="hidden" id="status" name="status" value="done">
                            <button type="submit" class="btn btn-link">Done</button>
                        </form>

                    </div>
                </div>
                @foreach($tasks as $task)
                    @if($project->id == $task->project_id)
                        <div class="card mt-4">
                            <div class="card-header">
                                {{ $task->status }}
                            </div>
                            <div class="card-body">
                                <a href="{{ route( 'task.show', $task->id ) }}">
                                    <h5 class="card-title">{{ $task->title }}</h5>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

