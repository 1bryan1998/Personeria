<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','cargo','area', 'password','foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function Eventos()
    {
        return $this->hasMany('App\Eventos');
    }

}
