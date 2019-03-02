<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    // Direct user to the projects homepage and pass in any projects
    public function index()
    {
        // Fetch all products from database and save them into the $projects variable
        $projects = Project::all();

        // Return projects view and pass in the $projects data to be used in the browser with compact()
        return view('projects.index', compact('projects'));
    }

    // Store product into DB
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

    // Fetch product from DB and direct user to that page
    public function show()
    {
        // Fetch / find a single product equal to the project id from the url (check web.php)
        $project = Project::findOrFail(request('project'));

        // Returns the projects show view
        return view('projects.show', compact('project'));
    }
}
