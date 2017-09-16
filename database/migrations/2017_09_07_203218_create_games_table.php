<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('game_type_id')->unsigned();
            $table->foreign('game_type_id')->references('id')->on('game_types');

            $table->string('note')->nullable();

            $table->timestamp('started_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('finished_at');

            // who created the game
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');

            // who hosted the game
            $table->integer('host_id')->unsigned();
            $table->foreign('host_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
