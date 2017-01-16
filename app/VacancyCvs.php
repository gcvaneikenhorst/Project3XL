<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyCvs extends Model
{
    protected $table = 'vacancy_cvs';
    protected $fillable = ['cv_id','vacancy_id','num_matches'];
    public $timestamps = false;


}
