<?php

namespace App\Http\Controllers;

use App\CV;
use App\Vacancy;
use App\VacancyCvs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
{
    /**
     * Get matches
     * @return mixed
     */
    public function getMatches()
    {
        $vacancies = Vacancy::where('company_id', Auth::user()->userable()->first()->id)->get();

        $return = [];
        foreach ($vacancies as $vacancy) {
            $a = $vacancy->matches()->get(['title', 'vacancy_cvs.num_matches', 'vacancy_cvs.cv_id', 'vacancy_cvs.vacancy_id']);

            foreach ($a as $cv) {

                $return[] = $cv;
            }


        }

        return $return;
    }

    /**
     * Get matches the company has payed for
     * @return mixed
     */
    public function getPayedMatches()
    {

        $vacancies = Vacancy::where('company_id', Auth::user()->userable()->first()->id)->get();

        $return = [];
        foreach ($vacancies as $vacancy) {
            $a = $vacancy->matchesPayed()->get();

            foreach ($a as $cv) {

                $return[] = $cv;
            }

        }
        return $return;
    }

    /**
     * Show a list of matches for the current user
     * @return mixed
     */
    public function index()
    {
        return View('matches/index');
    }


    public function getCVinfo($id){
        return CV::where('id',$id)->first(['title','text']);
    }
}
