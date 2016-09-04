<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $primaryKey = 'game_id';

	protected $dates = [
        'game_time',
    ];


    public function session()
    {
        return $this->belongsTo('App\Session');
    }

    public function field()
    {
        return $this->belongsTo('App\Field');
    }

    public function home_team()
    {
        return $this->belongsTo('App\Team');
    }

    public function away_team()
    {
        return $this->belongsTo('App\Team');
    }
}
