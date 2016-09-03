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
        $teamCaptain = TeamRoster::where( 'team_id', $team_id )
            ->where( 'captain', '1' )->first( );

        if( !is_null( $teamCaptain ) )
        {
            $teamCaptain = $teamCaptain->user;
            $teamCaptain = $teamCaptain->first_name." ".$teamCaptain->last_name;
        }

        return $teamCaptain ;
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function teamroster()
    {
        return $this->hasMany('App\TeamRoster');
    }

    public function game()
    {
        return $this->hasMany('App\Game');
    }


}
