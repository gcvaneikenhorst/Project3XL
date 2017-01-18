<?php

namespace App\Http\Controllers;

use App\User;
use App\CV;
use App\Vacancy;
use App\VacancyCvs;
use App\VacancyCvsPayed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
{
	public function cvPage($id){
		return View('matches/cv')->with(['cv'=>CV::where('id',$id)->first()]);;
	}
    /**
     * Get matches
     * @return mixed
     */
    public function getMatches()
    {
        $vacancies = Vacancy::where('company_id', Auth::user()->userable()->first()->id)->get();

        $return = [];
        foreach ($vacancies as $vacancy) {
            $a = $vacancy->matches()->get(['title', 'vacancy_cvs.num_matches', 'vacancy_cvs.cv_id', 'vacancy_cvs.vacancy_id','vacancy_cvs.id as link']);

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
        return View('matches/index')->with(['token'=> User::find(Auth::user()->id)->api_token]);
    }


    public function getCVinfo($id){

        $payed = Vacancy::byOwnerPayed(Auth::user()->userable()->first()->id,$id)->get()->count();
        if($payed == 1){

            return CV::with('applicant')->where('id',$id)->first();
        }
        elseif(Vacancy::byOwner(Auth::user()->userable()->first()->id,$id)->get()->count() == 1){

            

            return CV::where('id',$id)->first(['title','text']);
        }


        return 'Geen cv gevonden.';
    }

    public function pay(Request $request){
        $data = $request->json()->all();
        foreach ($data['payed'] as $pay){
            $link = VacancyCvs::find($pay);
            $dat = [
                'cv_id' => $link->cv_id,
                'vacancy_id' => $link->vacancy_id,
                'num_matches' => $link->num_matches,
            ];
            $link->delete();
            $payed = VacancyCvsPayed::create($dat);
            $payed->save();
        }

        return ['Transactie succesvol'];

    }
}
