<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('home_id')->unsigned();
            $table->tinyInteger('away_id')->unsigned();
            $table->integer('week_id')->unsigned();
            $table->tinyInteger('spread')->index()->nullable();
            $table->tinyInteger('winner_id')->unsigned()->nullable();
            $table->tinyInteger('result')->unsigned()->nullable();
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
        Schema::dropIfExists('matches');
    }
}
