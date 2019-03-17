<!-- View extends layouts/app.blade.php 
---- Dashboard
-->
@extends ('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-end w-full">

            <p class="text-grey text-sm font-normal">My Projects</p>

            <a href="/projects/create" class="button bg-blue">Create project</a>

        </div>

    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">

        @forelse ($projects as $project)

            <div class="lg:w-1/3 px-3 pb-6">

                @include ('projects.card')

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