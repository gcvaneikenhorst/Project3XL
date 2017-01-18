<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Company;
use App\Vacancy;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome', [
            'applicantCount' => count(Applicant::all()),
            'companyCount'  => count(Company::all()),
            'vacancyCount'  => count(Vacancy::all()),
        ]);
    }
}
