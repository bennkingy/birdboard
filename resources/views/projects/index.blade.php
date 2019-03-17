<!-- View extends layouts/app.blade.php 
---- Dashboard
-->
@extends ('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-center w-full">

            <h2 class="text-grey text-sm font-normal">My Projects</h2>

            <a href="/projects/create" class="button bg-blue">Create project</a>

        </div>

    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">

        @forelse ($projects as $project)

        <div class="lg:w-1/3 px-3 pb-6">

            <div class="bg-white rounded-lg shadow p-5" style="height:200px;box-sizing: content-box;">
                    
                <h3 class="font-normal text-xl mb-6 py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
                    
                    <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
                
                </h3>

                <div class="text-grey">{{ str_limit($project->description, 70) }}</div>

            </div>

        </div>

        @empty

            <div class="bg-white mr-4 p-5 w-1/3 rounded shadow" style="height:200px;">No projects yet.</div>

        @endforelse

    </main>

    {{--
        
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
    
    --}}

@endsection