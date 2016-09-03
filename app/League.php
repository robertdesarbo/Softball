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

    public function division()
    {
        return $this->hasMany('App\Division');
    }

    public function rule()
    {
        return $this->hasMany('App\Rule');
    }
}
