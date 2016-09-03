<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Umpire extends Model
{
	protected $primaryKey = 'umpire_id';

	protected $fillable = [
        'first_name',
        'last_name',
    ];
}
