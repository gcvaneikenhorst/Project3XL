<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $fillable = ['date','title','text','company_id','category_id'];
    public $timestamps = false;

    public function competences()
    {
        return $this->belongsToMany('App\Competence','vacancy_competence','vacancy_id');
    }

}
