<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;


    public function userable()
    {
        return $this->morphTo();
    }

    protected $fillable = [
        'name', 'email', 'enabled', 'api_token', 'password','userable_type','userable_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
