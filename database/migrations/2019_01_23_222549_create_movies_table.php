<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('genres');
            $table->integer('runtime')->unsigned();
            $table->date('release_date');
            $table->boolean('adult');
            $table->integer('revenue')->unsigned();
            $table->integer('budget')->unsigned();
            $table->string('status');
            $table->string('tagline');
            $table->string('poster_path');
            $table->string('backdrop_path');
            $table->string('video');
            $table->integer('vote_count')->unsigned();
            $table->float('vote_average');
            $table->text('production_companies');
            $table->text('cast');
            $table->text('crew');
            $table->string('overview');
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
        Schema::dropIfExists('movies');
    }
}
