<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

// To play around in the terminal, run: php artisan tinker &&  factory('App\Project')->create();

class ProjectsController extends Controller
{
    // Direct user to the projects homepage and pass in any projects
    public function index()
    {
        // Fetch all products from database and save them into the $projects variable
        // $projects = Project::all();

        // Fetch all products for the signed in user
        $projects = auth()->user()->projects;

        // Return projects view and pass in the $projects data to be used in the browser with compact()
        return view('projects.index', compact('projects'));
    }

    // Store product into DB
    public function store()
    {
        // REFRACTOR - Validation
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        // validation for owner id is done through middleware (which is safer)
        auth()->user()->projects()->create($attributes);

        // REFRACTOR - Persist/save data (save it to the DB)
        // Project::create($attributes);

        // // Validation
        // request()->validate(['title' => 'required', 'description' => 'required']); // Make sure the title field is enterd

        // // Persist/save data (save it to the DB)
        // Project::create(request(['title', 'description'])); // Fetch data from Project Model

        // Redirect page
        return redirect('/projects');
    }

    // Refractor of show method to use route model binding
    public function show(Project $project)
    {
        // If the authenticated user is not the project owner, abort!
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }
    // // Fetch product from DB and direct user to that page - Refactored above
    // public function show()
    // {
    //     // Fetch / find a single product equal to the project id from the url (check web.php)
    //     $project = Project::findOrFail(request('project'));

    //     // Returns the projects show view
    //     return view('projects.show', compact('project'));
    // }

    public function create()
    {
        // create project and return page
        return view('projects.create');
    }
}
