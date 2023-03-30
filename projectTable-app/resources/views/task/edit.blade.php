@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Task</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route( 'task.update', $task->id ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               id="title"
                               aria-describedby=""
                               placeholder="Enter title"
                               value="{{ $task->title }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="title">Descriptions</label>
                        <textarea
                            name="descriptions"
                            class="form-control"
                            id="descriptions"
                            cols="30"
                            rows="10">{{ $task->descriptions }}
                        </textarea>

                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file"
                                   name="file"
                                   class="form-control-file"
                                   id="file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
