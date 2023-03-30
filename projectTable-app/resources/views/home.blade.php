@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route( 'project.create' ) }}">
        <button type="button" class="btn btn-outline-primary">+ Add New Project</button>
    </a>
    <div class="row justify-content-center">
        @foreach($projects as $project)
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href=" {{ route ( 'project.show', $project->id ) }}">
                            <h5 class="mr-lg-2">
                                {{ $project->title }}
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
