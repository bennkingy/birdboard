<?php

namespace Tests\Feature;

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

        // create a dummy user and set them to authenticated (signs them in)
        $this->actingAs(factory('App\User')->create());
        
        // Enable better debugging
        $this->withoutExceptionHandling();

        // Data that will be going into the DB
        $attributes = [
          
            // Title of project
            'title' => $this->faker->sentence,

            // Description of project
            'description' => $this->faker->paragraph

        ];

        // Post request to create a project with the data and then redirect a user to a page
        $this->post('/projects', $attributes)->assertRedirect('/projects');

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
        $this->actingAs(factory('App\User')->create());

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
        $this->actingAs(factory('App\User')->create());

        // Overide attributes to make title an empty string so a validation error occurs
        $attributes = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */

    // Given a project is available, make sure the user has can view it
    public function a_user_can_view_a_project()
    {
        // Enable better debugging
        $this->withoutExceptionHandling();

        // Create a project using the factory class
        $project = factory('App\Project')->create();

        // If I make get request to fetch a proect make sure the project title and description is on the page
        $this->get('/projects/' . $project->id)
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test
     *
     * TO RUN TEST: vendor/bin/phpunit --filter a_project_requires_a_owner */

    // Test to make sure that a created project has an owner
    public function only_authenticated_user_can_create_a_project()
    {
        // Overide attributes to make title an empty string so a validation error occurs
        $attributes = factory('App\Project')->raw();

        // If user is not authenticated then redirect them to the login page
        $this->post('/projects', $attributes)->assertRedirect('login');
    }
}
