<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $primaryKey = 'rule_id';

    protected $fillable = [
        'rule',
    ];

    public function league()
    {
        return $this->belongsTo('App\League');
    }
}
