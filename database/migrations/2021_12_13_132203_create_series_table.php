<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->unique();
            $table->year('year');
            $table->smallInteger('seasons');
            $table->smallInteger('episodesPerSeason');
            $table->integer('stars');
            $table->text('review');

            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
