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
     * TO RUN TEST: c */

    // Test to make sure a user can create a project
    public function a_user_can_create_a_project()
    {
        // Enable better debugging
        $this->withoutExceptionHandling();

        // Data that will be going into the DB
        $attributes = [
          
            // Title of project
            'title' => $this->faker->sentence,

            // Description of project
            'description' => $this->faker->paragraph

        ];

        // Post request to create a project with the data
        $this->post('/projects', $attributes);

        // Make sure that database has a table called projects and can accept the data
        $this->assertDatabaseHas('projects', $attributes);

        // Get request to /projects to assert that a project with a title is on the page
        $this->get('/projects')->assertSee($attributes['title']);
    }
}
