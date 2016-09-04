<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
	protected $toTruncate = [ 'umpires', 'rules', 'games', 'fields', 'teams_roster', 'teams', 'leagues', 'password_resets', 'users' ] ;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	foreach( $this->toTruncate as $table )
    	{
    		DB::table( $table )->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$faker = Faker::create();

    	#Leagues
        factory(App\League::class, 3)->create( );

    	#Players/Users
        factory(App\User::class, 150)->create( [ 'password' => bcrypt( 'password' ) ] );

		#Fields
        factory(App\Field::class, 15)->create( );

		#Umpires
        factory(App\Umpire::class, 10)->create( );

        $userIDs 	= DB::table('users')->pluck('user_id');
        $leagueIDs 	= DB::table('leagues')->pluck('league_id');
        $fieldIDs 	= DB::table('fields')->pluck('field_id');
        $umpireIDs  = DB::table('umpires')->pluck('umpire_id');

        #Rules
        foreach (range(1,10) as $index)
        {
        	factory(App\Rule::class, 10)->create( [ 
	       		'league_id' => $leagueIDs[ array_rand( $leagueIDs, 1 ) ],
	        ]);
        }

        #Divisions
        foreach ( $leagueIDs as $league_id )
        {
        	factory(App\Division::class, 2)->create( [ 
	       		'league_id' => $league_id,
	        ]);
        }

        $divisonIDs 	= DB::table('divisions')->pluck('division_id');

        #Sessions
        foreach ( $divisonIDs as $division_id )
        {
        	factory(App\Session::class, 2)->create( [ 
	       		'division_id' => $division_id,
	        ]);
        }

        $sessionIDs 	= DB::table('sessions')->pluck('session_id');

        #Teams -> Players & Games
        foreach ( $sessionIDs as $session_id )
        {
        	#Teams
        	$teamIDs = factory(App\Team::class, 10)->create( [ 
	       		'session_id' => $session_id,
	        ]);

        	$teamIDsAsArray = $teamIDs->toArray();

		    foreach ( $teamIDs as $team )
	        {

	        	#Team Roster
	        	foreach ( range(1,15) as $index )
	        	{
		        	factory(App\TeamRoster::class)->create( [ 
		        		'team_id' => $team->team_id,
			       		'user_id' => $userIDs[ array_rand( $userIDs, 1 ) ],
			        ]);
		        }

		        #Half Games Played
		        foreach ( range(1,5) as $index )
	        	{
	        		$away_team_id = 0;

	        		$away_team_id = $teamIDsAsArray[ array_rand( $teamIDsAsArray, 1 ) ][ 'team_id' ];
	        		while( $away_team_id == $team->team_id )
	        		{
	        			$away_team_id = $teamIDsAsArray[ array_rand( $teamIDsAsArray, 1 ) ][ 'team_id' ];
	        		}

		        	factory(App\Game::class)->create( [
		        		'session_id' => $session_id,
		        		'home_team_id' => $team->team_id,
		        		'away_team_id' => $away_team_id,
		        		'home_team_score' => $faker->randomDigit,
		        		'away_team_score' => $faker->randomDigit,
		        		'score_recored_time' => $faker->dateTimeBetween('-1 month', 'now'),
			       		'field_id' => $fieldIDs[ array_rand( $fieldIDs, 1 ) ],
			       		'umpire_id' => $umpireIDs[ array_rand( $umpireIDs, 1 ) ],
			        ]);
		        }

		        #Half Games Scheduled
		        foreach ( range(1,5) as $index )
	        	{
	        		$away_team_id = 0;

	        		$away_team_id = $teamIDsAsArray[ array_rand( $teamIDsAsArray, 1 ) ][ 'team_id' ];
	        		while( $away_team_id == $team->team_id )
	        		{
	        			$away_team_id = $teamIDsAsArray[ array_rand( $teamIDsAsArray, 1 ) ][ 'team_id' ];
	        		}

		        	factory(App\Game::class)->create( [
		        		'session_id' => $session_id,
		        		'home_team_id' => $team->team_id,
		        		'away_team_id' => $away_team_id,
			       		'field_id' => $fieldIDs[ array_rand( $fieldIDs, 1 ) ],
			       		'umpire_id' => $umpireIDs[ array_rand( $umpireIDs, 1 ) ],
			        ]);
		        }
	        }
        }
    }
}
