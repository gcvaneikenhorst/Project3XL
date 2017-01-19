<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = ['date', 'title', 'text', 'company_id', 'category_id'];
    public $timestamps = false;

    public function competences()
    {
        return $this->belongsToMany('App\Competence', 'vacancy_competence', 'vacancy_id');
    }

    public function matches()
    {
        return $this->belongsToMany('App\CV', 'vacancy_cvs', 'vacancy_id', 'cv_id');
    }

    public function matchesPayed()
    {
        return $this->belongsToMany('App\CV', 'vacancy_cvs_payed', 'vacancy_id', 'cv_id');
    }


    public function pivotData()
    {
        return $this->hasMany('App\VacancyCvs');
    }

    public static function scopeByOwner($query, $companyId,$cv)
    {
        $query->join('vacancy_cvs', 'vacancy_cvs.vacancy_id', '=', 'vacancies.id')
            ->join('cvs', 'cvs.id', '=', 'vacancy_cvs.cv_id')
            ->where('vacancies.company_id',$companyId)
            ->where('cvs.id',$cv)
            ->select('cvs.*','vacancy_cvs.id as link');;
    }

    public static function scopeByOwnerPayed($query, $companyId,$cv)
    {
        $query->join('vacancy_cvs_payed', 'vacancy_cvs_payed.vacancy_id', '=', 'vacancies.id')
            ->join('cvs', 'cvs.id', '=', 'vacancy_cvs_payed.cv_id')
            ->where('vacancies.company_id',$companyId)
            ->where('cvs.id',$cv);


    }
}
