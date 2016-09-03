<?php

use Illuminate\Database\Seeder;

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

    	#Leagues
        factory(App\League::class, 5)->create( );

    	#Players/Users
        factory(App\User::class, 150)->create( [ 'password' => bcrypt( 'password' ) ] );

		#Fields
        factory(App\Field::class, 15)->create( );

		#Umpires
        factory(App\Umpire::class, 15)->create( );

        $userIDs 	= DB::table('users')->pluck('user_id');
        $leagueIDs 	= DB::table('leagues')->pluck('league_id');
        $fieldIDs 	= DB::table('fields')->pluck('field_id');
        $umpireIDs  = DB::table('umpires')->pluck('umpire_id');

        #Rules
        foreach (range(1,10) as $index)
        {
        	factory(App\Rule::class, 10)->create( [ 
	       		'league_id' => $leagueIDs[ array_rand( $leagueIDs, 1 ) ]
	        ]);
        }

        #Teams
        foreach (range(1,10) as $index)
        {
        	factory(App\Team::class, 25)->create( [ 
	       		'league_id' => $leagueIDs[ array_rand( $leagueIDs, 1 ) ]
	        ]);
        }

        $teamIDs 	= DB::table('teams')->pluck('team_id');

        #Team Roster
        foreach (range(1,300) as $index)
        {
        	factory(App\TeamRoster::class)->create( [ 
        		'team_id' => $teamIDs[ array_rand( $teamIDs, 1 ) ],
	       		'user_id' => $userIDs[ array_rand( $userIDs, 1 ) ]
	        ]);
        }

        #Games
        foreach (range(1,300) as $index)
        {
        	factory(App\Game::class)->create( [
        		'home_team_id' => $teamIDs[ array_rand( $teamIDs, 1 ) ],
        		'away_team_id' => $teamIDs[ array_rand( $teamIDs, 1 ) ],
	       		'field_id' => $fieldIDs[ array_rand( $fieldIDs, 1 ) ],
	       		'umpire_id' => $umpireIDs[ array_rand( $umpireIDs, 1 ) ],
	        ]);
        }







  

    }
}
