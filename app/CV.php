<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';
    protected $fillable = ['date','title','video','motivation','applicant_id','category_id'];
    public $timestamps = false;
}
