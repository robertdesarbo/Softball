<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	protected $primaryKey = 'session_id';

    protected $fillable = [
        'start_date', 'end_date', 'active',
    ];

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function team()
    {
        return $this->hasMany('App\Team');
    }

    public function game()
    {
        return $this->hasMany('App\Game');
    }
}
