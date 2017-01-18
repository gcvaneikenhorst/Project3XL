<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Company;
use App\CV;
use App\User;
use App\Vacancy;
use App\VacancyCvs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->userable_type) {
            case 'App\Applicant':
                return $this->applicantIndex();
            case 'App\Company':
                return $this->companyIndex();
            case 'App\Admin':
                return $this->adminIndex();
        }
    }

    public function applicantIndex() {
        $cvs        = CV::where('applicant_id', Auth::user()->userable_id);

        return view('home', [
            'cvCount'       => count($cvs),
        ]);
    }

    public function companyIndex() {
        $vacancies  = Vacancy::where('company_id', Auth::user()->userable_id);

        return view('home', [
            'vacancyCount'  => count($vacancies),
            //'matchCount'    => count($cvs),
        ]);
    }

    public function adminIndex() {
        $cvStats = [];
        $date = new \DateTime();
        $date->modify('-6day');
        for ($i=1; $i<=7; $i++) {
            $cvs = CV::where([
                ['date', '>', $date->format('Y-m-d').' 00:00:00'],
                ['date', '<', $date->format('Y-m-d').' 23:59:59'],
            ])->get();

            $cvStats[$date->format('l')] = count($cvs);

            $date->modify('+1day');
        }

        $vacancyStats = [];
        $date = new \DateTime();
        $date->modify('-6day');
        for ($i=1; $i<=7; $i++) {
            $vacancies = Vacancy::where([
                ['date', '>', $date->format('Y-m-d').' 00:00:00'],
                ['date', '<', $date->format('Y-m-d').' 23:59:59'],
            ])->get();

            $vacancyStats[$date->format('l')] = count($vacancies);

            $date->modify('+1day');
        }

        return view('home', [
            'userCount'     => count(User::all()),
            'applicantCount' => count(Applicant::all()),
            'companyCount'  => count(Company::all()),
            'cvCount'       => count(CV::all()),
            'vacancyCount'  => count(Vacancy::all()),
            'matchCount'    => count(VacancyCvs::all()),

            'cvStats'       => $cvStats,
            'vacancyStats'  => $vacancyStats,
        ]);
    }
}
