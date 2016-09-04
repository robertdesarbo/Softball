<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TeamRoster extends Model
{
    protected $table        = "teams_roster";

	protected $primaryKey   = 'team_roster_id';

    protected $fillable = [
        'active', 'captain',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id' );
    }


}
