<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiceRollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dice_rolls', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            // make sure that validation constrains this to 2 <= value <= 12
            $table->integer('value')->unsigned();

            // this should be: 'blue', 'green', 'yellow' or 'ship'
            // but applicable only to certain game types
            $table->string('color')->nullable();

            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dice_rolls');
    }
}
