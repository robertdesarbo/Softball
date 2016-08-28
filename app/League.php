<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
	protected $primaryKey = 'league_id';

    protected $fillable = [
        'name',
        'type',
        'active',
    ];

    public function team()
    {
        return $this->hasMany('App\Team');
    }
}
