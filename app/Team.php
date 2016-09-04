<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $primaryKey = 'team_id';

    protected $fillable = [
        'name',
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

    public function session()
    {
        return $this->belongsTo('App\Session');
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
