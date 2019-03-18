<?php

namespace Tests\Feature;

use App\Project;

use Tests\TestCase;

// WithFaker library for dummy text (name, sentence, etc)
use Illuminate\Foundation\Testing\WithFaker;

// After test completed, reset database back to original state with RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test
     *
     * TO RUN TEST: vendor/bin/phpunit tests/Feature/ProjectsTest.php */

    // Test to make sure a user can create a project
    public function a_user_can_create_a_project()
    {
        // Enable better debugging
        $this->withoutExceptionHandling();

        // create a dummy user and set them to authenticated (signs them in)
        // $this->actingAs(factory('App\User')->create());
        $this->signIn(); // refactor of above

        // create view/route should exist
        $this->get('/projects/create')->assertStatus(200);

        // Data that will be going into the DB
        $attributes = [
          
            // Title of project
            'title' => $this->faker->sentence,

            // Description of project
            'description' => $this->faker->paragraph

        ];

        // // Post request to create a project with the data and then redirect a user to a page
        // $this->post('/projects', $attributes)->assertRedirect('/projects');
        $response = $this->post('/projects', $attributes);

        $project = Project::where($attributes)->first();

        $response->assertRedirect($project->path());

        // Make sure that database has a table called projects and can accept the data
        $this->assertDatabaseHas('projects', $attributes);

        // Get request to /projects to assert that a project with a title is present on the view
        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test
     *
     * TO RUN TEST: vendor/bin/phpunit --filter a_project_requires_a_title */

    // Test to make sure that a created project has a title (signs them in)
    public function a_project_requires_a_title()
    {
        // create a dummy user and set them to authenticated
        //$this->actingAs(factory('App\User')->create());
        $this->signIn(); // refactor of above

        // Overide attributes to make title an empty string so a validation error occurs (this stops other validation issues conflicting with this test)
        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test
     *
     * TO RUN TEST: pf ProjectsTest */

    // Test to make sure that a created project has a description
    public function a_project_requires_a_description()
    {
        // create a dummy user and set them to authenticated (signs them in)
        //$this->actingAs(factory('App\User')->create());
        $this->signIn(); // refactor of above

        // Overide attributes to make title an empty string so a validation error occurs
        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */

    // Given a project is available that the user created, make sure the user can view it
    public function a_user_can_view_their_project()
    {
        // Enable better debugging
        $this->withoutExceptionHandling();

        // Create signed in user
        //$this->be(factory('App\User')->create());
        $this->signIn(); // refactor of above
        
        // Create a project using the factory class, with an authenicated user
        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        // If I make get request to fetch a proect make sure the project title and description is on the page
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */

    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        // Create signed in user
        $this->be(factory('App\User')->create());

        // Save project to variable
        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }
    
    /** @test
     *
     * TO RUN TEST: vendor/bin/phpunit --filter a_project_requires_a_owner */

    // Guests test
    public function guests_cannot_create_projects()
    {
        // Save project to variable
        $project = factory('App\Project')->create();

        // If user is not authenticated then redirect them to the login page
        $this->get('/projects')->assertRedirect('login');

        // If user is not authenticated then redirect them to the login page
        $this->get('/projects/create')->assertRedirect('login');
        
        
        // If user is not authenticated then redirect them to the login page
        $this->post('/projects', $project->toArray())->assertRedirect('login');

        // If user is not authenticated then redirect them to the login page
        $this->get($project->path())->assertRedirect('login');
    }
}
