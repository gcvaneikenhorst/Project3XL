<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyCvsPayed extends Model
{
    protected $table = 'vacancy_cvs_payed';
    protected $fillable = ['cv_id','vacancy_id','num_matches'];
    public $timestamps = false;
}
