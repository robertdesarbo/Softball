<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $primaryKey = 'player_id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function setDateOfBirthAtrribute($date)
    {
    	$this->attributes[ 'date_of_birth' ] = Carbon::parse( $date );
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function teamroster()
    {
        return $this->hasMany('App\TeamRoster');
    }





}
