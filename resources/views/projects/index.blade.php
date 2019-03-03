<!-- View extends layouts/app.blade.php -->
@extends ('layouts.app')
@section('content')

    <div style="display:flex; align-items:center;">

        <h1 style="margin-right:auto;">Birdboard</h1>

        <a href="/projects/create">Create project</a>
    
    </div>

    <ul>
        <!-- forelse is a foreach but returns empty if the array is empty -->
        @forelse ($projects as $project)

            <li> <!-- Loop through projects table and return the projects in list items -->
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>

        @empty

            <li>No Projects yet.</li>

        @endforelse
    </ul>

@endsection