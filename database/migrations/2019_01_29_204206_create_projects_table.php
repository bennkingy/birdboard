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

            // Project table, title column
            $table->string('title');

            // Project table, title column
            $table->text('description');

            // Project table, timestamp column
            $table->timestamps();
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
