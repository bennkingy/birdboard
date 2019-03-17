<?php

// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HTTP url request to homepage
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    // // HTTP url request to projects page, make sure user is signed in
    Route::get('/projects', 'ProjectsController@index');

    // // HTTP url request to projects page, make sure user is signed in
    Route::get('/projects/create', 'ProjectsController@create');

    // HTTP post request to store a new project into the DB
    Route::post('/projects', 'ProjectsController@store');

    // HTTP get request to fetch and show on the page a unique/single project from the DB
    Route::get('/projects/{project}', 'ProjectsController@show');

    // HTTP post request to create new task
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});

// Login authentication routes
Auth::routes();

// // HTTP url request to projects page, make sure user is signed in
// Route::get('/projects', 'ProjectsController@index')->middleware('auth');

// // HTTP post request to store a new project into the DB
// Route::post('/projects', 'ProjectsController@store')->middleware('auth');

// // HTTP get request to fetch and show on the page a unique/single project from the DB
// Route::get('/projects/{project}', 'ProjectsController@show')->middleware('auth');

// *** CREATED PROJECT CONTROLLER TO HANDLE THE HTTP REQUESTS BELOW - SEE ABOVE ^
// // HTTP Get request - Respond to get request to fetch or show a project(s)
// Route::get('/projects', function () {

//     // Fetch all products from database and save them into the $projects variable
//     $projects = App\Project::all();

//     // Return projects view and pass in the $projects data to be used in the browser with compact()
//     return view('projects.index', compact('projects'));
// });

// // HTTP Post request - Respond to a post request to create a project(s)
// Route::post('/projects', function () {

//     // Validate data

//     // Persist data (save it to the DB)
//     App\Project::create(request(['title', 'description'])); // Fetch data from Project Model

//     // Redirect page
// });
