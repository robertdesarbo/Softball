<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	protected $primaryKey = 'division_id';

    protected $fillable = [
        'name',
        'active',
    ];

    public function league()
    {
        return $this->belongsTo('App\League');
    }

    public function session()
    {
        return $this->hasMany('App\Session');
    }

}
