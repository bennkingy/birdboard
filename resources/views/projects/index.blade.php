<!-- View extends layouts/app.blade.php 
---- Dashboard
-->
@extends ('layouts.app')
@section('content')

    <div class="flex items-center mb-3">

        <h1 class="mr-auto">Birdboard</h1>

        <a href="/projects/create">Create project</a>
    
    </div>

    <div class="flex flex-wrap -mx-3">

        @forelse ($projects as $project)

        <div class="w-1/3 px-3 pb-6">

            <div class="bg-white rounded shadow p-5" style="height:200px;box-sizing: content-box;">
                    
                <h3 class="font-normal text-xl mb-6 py-4">{{ $project->title }}</h3>

                <div class="text-grey">{{ str_limit($project->description, 70) }}</div>

            </div>
        </div>

        @empty

            <div class="bg-white mr-4 p-5 w-1/3 rounded shadow" style="height:200px;">No projects yet.</div>

        @endforelse

    </div>

    {{-- <ul>
        <!-- forelse is a foreach but returns empty if the array is empty -->
        @forelse ($projects as $project)

            <li> <!-- Loop through projects table and return the projects in list items -->
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>

        @empty

            <li>No Projects yet.</li>

        @endforelse
    </ul> --}}

@endsection