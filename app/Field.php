<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	protected $primaryKey = 'field_id';

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'active',
    ];
}
