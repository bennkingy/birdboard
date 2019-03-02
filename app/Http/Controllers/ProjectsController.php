<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        // Fetch all products from database and save them into the $projects variable
        $projects = Project::all();

        // Return projects view and pass in the $projects data to be used in the browser with compact()
        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        // REFRACTOR - Validation
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);

        // REFRACTOR - Persist/save data (save it to the DB)
        Project::create($attributes);

        // // Validation
        // request()->validate(['title' => 'required', 'description' => 'required']); // Make sure the title field is enterd

        // // Persist/save data (save it to the DB)
        // Project::create(request(['title', 'description'])); // Fetch data from Project Model

        // Redirect page
        return redirect('/projects');
    }
}
