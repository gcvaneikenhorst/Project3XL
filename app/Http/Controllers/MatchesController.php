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
        $matches = Vacancy::find(Auth::user()->userable()->first()->id)->pivotData()->get();

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

    public function viewMatches(){
        return View('matches/index');
    }
}
