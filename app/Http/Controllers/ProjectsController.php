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
        // Validate data

        // Persist data (save it to the DB)
        Project::create(request(['title', 'description'])); // Fetch data from Project Model

        // Redirect page
        return redirect('/projects');
    }
}
