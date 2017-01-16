<?php

namespace App\Http\Controllers;

use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VacancyController extends Controller
{
    public function create(){

        return view('vacancy/create');
    }


    public function save(Request $request){

        $data = $request->all();

        $company = User::find(Auth::user()->id)->userable()->first()->id;

        $vacancy = [
            'title' => $data['titel'],
            'text' => $data['text'],
            'category_id' => $data['category_id'],
            'company_id' => $company ,
            'date' => \Carbon\Carbon::parse($data['date']),
        ];

        $vacancy = Vacancy::create($vacancy);
        $vacancy->save();
        $vacancy->competences()->sync($data['competence'],false);

        return Vacancy::find($vacancy->id);
    }
}
