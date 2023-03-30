@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route( 'project.show', $task->project_id ) }}">
                    <span> BACK TO PROJECT </span>
                </a>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mr-2">
                    <div class="mt-2 mr-2">
                        <a href="{{ route( 'task.edit', ['task' => $task->id] ) }} ">
                            <button type="button" class="btn btn-outline-warning">Edit</button>
                        </a>
                    </div>
                    <div class="mt-2">
                        <form method="post" action="{{ route( 'task.destroy', $task->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        {{ $task->title }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->descriptions }}</h5>
                    </div>
                    @if( $task->file != null)
                        <form method="get" action="{{ route( 'task.download', $task->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <svg width="64px" height="42px" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" stroke="#858585">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier"> <g id="File / File_Download">
                                            <path id="Vector" d="M12 12V18M12 18L15 16M12 18L9 16M13 3.00087C12.9045 3 12.7973 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.5192 21 7.07899 21 8.19691 21H15.8031C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20296 19 9.09561 18.9991 9M13 3.00087C13.2856 3.00347 13.4663 3.01385 13.6388 3.05526C13.8429 3.10425 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59182 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53376 18.9963 8.71451 18.9991 9M13 3.00087V5.8C13 6.9201 13 7.47977 13.218 7.90759C13.4097 8.28392 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.9991M18.9991 9H19.0002" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                            <div>download</div>
                            </button>
                        </form>@else
                        <div class="m-2">
                            <span class="text-secondary">There are no uploaded files yet</span>
                        </div>
                    @endif
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <form method="post" action="{{ route( 'task.status', $task->id) }}" enctype="multipart/form-data">
                        @csrf
                           <span>Status:</span>
                            <select name="status" class="form-group" id="exampleSelectBorder">
                                <option value="new"
                                        @if($task->status == 'new')
                                            selected
                                    @endif
                                >
                                    New
                                </option>
                                <option value="progress"
                                        @if($task['status'] == 'progress')
                                            selected
                                    @endif
                                >
                                    Progress
                                </option>
                                <option value="done"
                                        @if($task['status'] == 'done')
                                            selected
                                    @endif
                                >
                                    Done
                                </option>
                            </select>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-outline-success mt-2">UPDATE STATUS</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
