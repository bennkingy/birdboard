<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_projects()
    {
        // Creating a dummy user and saving it to a variable
        $user = factory('App\User')->create();

        // The user can access its projects in the DB
        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
