<?php

namespace App\Http\Controllers;

use App\CV;
use App\Vacancy;
use App\VacancyCvs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    /**
     * Get matches
     * @return mixed
     */
    public function getMatches()
    {
        $matches = Vacancy::find(Auth::user()->userable()->first()->id)->matches()->get(['title','vacancy_cvs.num_matches','vacancy_cvs.cv_id','vacancy_cvs.vacancy_id']);

//        $data = [];
//        foreach ($matches as $match)
//        {
//            array_push($data,$match->pivot);
//        }
        return $matches;
    }

    public function getPayedMatches(){
        $data = Vacancy::find(Auth::user()->userable()->first()->id)->matchesPayed()->with('applicant')->get();

        return $data;
    }

    public function index(){
        return View('matches/index');
    }
}
