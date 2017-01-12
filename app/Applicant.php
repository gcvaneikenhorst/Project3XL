<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';
    protected $fillable = ['salutation','firstname','insertion','lastname','address','zipcode','location','phone','email'];
    public $timestamps = false;
    public function user()
    {
        return $this->morphMany('App\User', 'userable');
    }

    public function cvs()
    {
        return $this->hasMany('App\CV');
    }
}
