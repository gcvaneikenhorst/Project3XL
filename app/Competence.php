<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $table = 'competences';
    protected $fillable = ['name','description'];
    public $timestamps = false;
}
