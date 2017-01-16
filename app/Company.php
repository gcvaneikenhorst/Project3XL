<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public $timestamps = false;
    protected $table = 'companies';
    protected $fillable = ['name',
        'address',
        'zipcode',
        'city',
        'phone',
        'email',
        'website',
        'contactperson'];

    public function user()
    {
        return $this->morphMany('App\User', 'userable');
    }


    public function vacancies() {

        return $this->hasMany('App\Vacancy');
    }
}
