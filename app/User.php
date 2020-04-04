<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function baners()
    {
        return $this->hasMany(Baner::class);
    }

    public function owns($related)
    {
        return $related->user_id==$this->id;
    }

    public function status($user)
    {
        return $user->verified==1;

    }

    public function publish(Baner $baner)
    {
        return $this->baners()->save($baner);
    }
}
