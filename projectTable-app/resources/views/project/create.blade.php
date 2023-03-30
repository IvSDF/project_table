@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route( 'project.store' ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               id="title"
                               aria-describedby=""
                               placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="title">Descriptions</label>
                        <textarea
                            name="descriptions"
                            class="form-control"
                            id="descriptions"
                            cols="30"
                            rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
