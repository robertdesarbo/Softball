<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmpireEvaluation extends Model
{
	protected $primaryKey = 'umpire_evaluation_id';

	protected $fillable = [
        'rating',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function umpire()
    {
        return $this->belongsTo('App\Umpire');
    }
}
