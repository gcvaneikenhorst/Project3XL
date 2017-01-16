<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';
    protected $fillable = ['date','title', 'text', 'video','motivation','applicant_id','category_id'];
    public $timestamps = false;

    public function competences()
    {
        return $this->belongsToMany('App\Competence','cv_competence','cv_id');
    }

    public function vacancies()
    {
        return $this->belongsToMany('App\Vacancy','vacancy_cvs','cv_id');
    }

    public function applicant(){
        return $this->belongsTo('App\Applicant','vacancy_cvs_payed');
    }

}
