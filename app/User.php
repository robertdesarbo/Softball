<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'date_of_birth', 'address', 'city', 'state', 'zip', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setDateOfBirthAtrribute($date)
    {
        $this->attributes[ 'date_of_birth' ] = Carbon::parse( $date );
    }

    public function teamRoster()
    {
        return $this->hasMany('App\TeamRoster');
    }



}
