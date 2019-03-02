// php artisan make:factory ProjectFactory --model="App\Project" --- MADE THIS FILE
<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [

            // To use factory dummmy data, call 'php artisan tinker && factory('App\Project')->create() or ->make()(make wont persists/save the data)' in the command line
            'title' => $faker->sentence,

            'description' => $faker->paragraph

    ];
});
