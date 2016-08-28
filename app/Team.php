<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_name',
    ];


    public static function getTeamCaptain( $team_id )
    {
        $teamCaptain = TeamRoster::
            where( 'team_id', $team_id )->
            where( 'captain', '1' )->first()->player;

        return $teamCaptain->first_name." ".$teamCaptain->last_name;
    }

    public function teamroster()
    {
        return $this->hasMany('App\TeamRoster');
    }


}
