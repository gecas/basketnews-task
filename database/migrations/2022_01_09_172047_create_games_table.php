<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('game_id')->index();
            $table->string('date')->index();
            $table->timestamp('date_full');
            $table->string('arena');
            $table->string('city');
            $table->string('state');
            $table->string('home_team_name');
            $table->string('home_team_city');
            $table->string('home_team_short');
            $table->string('home_team_record');
            $table->string('home_team_points');
            $table->string('away_team_name');
            $table->string('away_team_city');
            $table->string('away_team_short');
            $table->string('away_team_record');
            $table->string('away_team_points');
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
        Schema::dropIfExists('games');
    }
}
