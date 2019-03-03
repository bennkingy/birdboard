<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates database tables
        Schema::create('projects', function (Blueprint $table) {

            // Project table, id column
            $table->increments('id');

            // Project table, id column
            $table->unsignedInteger('owner_id');

            // Project table, title column
            $table->string('title');

            // Project table, title column
            $table->text('description');

            // Project table, timestamp column
            $table->timestamps();

            // Project table, owner id column
            // foreign() creates a key on owner_id that actually references the users id
            // onDelete() removes all projects associated with the owner when the account is removed
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Deletes database tables
        Schema::dropIfExists('projects');
    }
}
