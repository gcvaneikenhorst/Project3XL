<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function create(){

        return view('vacancy/create');
    }
}
