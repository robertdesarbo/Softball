<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('player_id');
            $table->unsignedInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->smallInteger('zip');
            $table->string('gender',1);
            $table->timestamps();

            $table->foreign('user_id')->references( 'user_id' )->on( 'users' )->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('league_id');
            $table->string('name');
            $table->string('type');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('team_id');
            $table->unsignedInteger('league_id');
            $table->string('team_name');
            $table->timestamps();      

            $table->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');         

        });

        Schema::create('teams_roster', function (Blueprint $table) {
            $table->increments('team_roster_id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('player_id');
            $table->boolean('active');
            $table->boolean('captain');
            $table->timestamps();

            $table->foreign('team_id')->references( 'team_id' )->on( 'teams' )->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('player_id')->references( 'player_id' )->on( 'players' )->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->increments('field_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->smallInteger('zip');
            $table->boolean('alcohol_allowed');
            $table->boolean('night_games');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('umpires', function (Blueprint $table) {
            $table->increments('umpire_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        Schema::create('rules', function (Blueprint $table) {
            $table->increments('rule_id');
            $table->unsignedInteger('league_id');
            $table->string('rule');
            $table->timestamps();

            $table->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('games', function (Blueprint $table) {
            $table->increments('game_id');
            $table->unsignedInteger('league_id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('field_id');
            $table->dateTimeTz('game_time');
            $table->timestamps();

            $table->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team_id')->references( 'team_id' )->on( 'teams' )->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('field_id')->references( 'field_id' )->on( 'fields' )->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umpires');
        Schema::dropIfExists('rules');
        Schema::dropIfExists('games');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('teams_roster');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('players');
        Schema::dropIfExists('leagues');
      
    }
}
