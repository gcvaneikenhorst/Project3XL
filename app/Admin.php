<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['firstname','insertion','lastname','address','zipcode','location','phone','email'];
    public $timestamps = false;

    public function user()
    {
        return $this->morphMany('App\User', 'userable');
    }
}
