<!DOCTYPE html>
<html>

<head>

<title>Projects</title>

</head>

<body>

    <h1>Birdboard</h1>
    
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

</body>
</html> 