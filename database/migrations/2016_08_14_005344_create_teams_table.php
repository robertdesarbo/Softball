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
            $table->unsignedInteger('user_id')->foreign('user_id')->references( 'user_id' )->on( 'users' )->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->smallInteger('zip');
            $table->string('gender',1);
            $table->timestamps();
        });

        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('league_id');
            $table->string('name');
            $table->string('type');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('team_id');
            $table->unsignedInteger('league_id')->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('player_id')->foreign( 'player_id' )->references( 'player_id' )->on( 'players' )->onDelete('cascade')->onUpdate('cascade');
            $table->string('team_name');
            $table->timestamps();                

        });

        Schema::create('teams_roster', function (Blueprint $table) {
            $table->increments('team_roster_id');
            $table->unsignedInteger('team_id')->foreign('team_id')->references( 'team_id' )->on( 'teams' )->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('player_id')->foreign('player_id')->references( 'player_id' )->on( 'players' )->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->increments('field_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->smallInteger('zip');
            $table->tinyInteger('active');
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
            $table->unsignedInteger('league_id')->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');
            $table->string('rule');
            $table->timestamps();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->increments('game_id');
            $table->unsignedInteger('league_id')->foreign('league_id')->references( 'league_id' )->on( 'leagues' )->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('team_id')->foreign('team_id')->references( 'team_id' )->on( 'teams' )->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('field_id')->foreign('field_id')->references( 'field_id' )->on( 'fields' )->onDelete('cascade')->onUpdate('cascade');
            $table->dateTimeTz('game_time');
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
        Schema::drop('players');
        Schema::drop('leagues');
        Schema::drop('teams');
        Schema::drop('teams_roster');
        Schema::drop('fields');
        Schema::drop('umpires');
        Schema::drop('rules');
        Schema::drop('games');
    }
}
