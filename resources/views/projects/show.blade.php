<!-- View extends layouts/app.blade.php -->
@extends ('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-end w-full">

            <h2 class="text-grey text-sm font-normal">My Projects</h2>

            <a href="/projects/create" class="button bg-blue">Create project</a>

        </div>

    </header>

    <main>

        <div class="lg:flex -mx-3">

            <div class="lg:w-3/4 px-3 mb-6">

                <div class="mb-6">

                    <!-- Tasks -->
                    <h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>
                    <div class="card">Lorem Ipsum.</div>

                </div>

                <div class="mb-6">

                    <!-- General Notes -->
                    <h2 class="text-grey font-normal text-lg mb-3">General Notes</h2>
                    <div class="card">Lorem Ipsum.</div>

                </div>

            </div>

            <div class="lg:w-1/4 px-3">

                <div class="card">

                    <h1 class="mb-3"> {{ $project->title }} </h1>

                    <div> {{ $project->description }} </div>
                    
                    <a href="/projects">Go Back</a>

                </div>

            </div>

        </div>

    </main>

</body>
</html> 

@endsection