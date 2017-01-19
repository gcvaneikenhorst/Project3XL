<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class VacancyController extends Controller
{
    /**
     * Shows a list of all vacancies created by the user
     * @return mixed
     */
    public function index()
    {
        $vacancies = Company::find(Auth::user()->userable()->first()->id)->vacancies()->get();

        return view('vacancy/index', ['vacancies' => $vacancies]);
    }

    /**
     * Shows the creation form for vacancies
     * @return mixed
     */
    public function create()
    {

        return view('vacancy/create');
    }

    /**
     * Shows the edit page for an vacancy
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $vacancy = Vacancy::find($id);


        $competences = $vacancy->competences()->get();

        $selectedCompetence = [];
        foreach ($competences as $competence) {
            $selectedCompetence[] = $competence->id;
        }

        return view('vacancy/edit', ['vacancy' => $vacancy, 'competences' => $selectedCompetence]);
    }

    /**
     * Validation rules for a vacancy
     * @param $data
     * @return mixed
     */
    public function cvValidator($data)
    {
        return Validator::make($data, [
            'title' => 'required|min:6|max:200',
            'text' => 'required|max:8000',
            'category_id' => 'required'
        ]);
    }

    /**
     * Creates an vacancy from post data
     * @param Request $request
     * @return mixed
     */
    public function save(Request $request)
    {

        $data = $request->all();

        $this->cvValidator($data)->validate();

        $company = User::find(Auth::user()->id)->userable()->first()->id;

        $vacancy = [
            'title' => $data['title'],
            'text' => $data['text'],
            'category_id' => $data['category_id'],
            'company_id' => $company,
            'date' => \Carbon\Carbon::now(),
        ];

        $vacancy = Vacancy::create($vacancy);
        $vacancy->save();
        $vacancy->competences()->sync($data['competence'], false);

        return Redirect::to('/vacancy');
    }

    /**
     * Deletes a vacancy
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $vacancy = Vacancy::find($id);

        return view('vacancy/delete', [
            'vacancy' => $vacancy,
        ]);
    }

    public function doDelete($id, Request $request)
    {
        $data = $request->all();

        if ($data['id'] != $id) {
            return Redirect::to('/vacancy');
        }

        $vacancy = Vacancy::find($id);
        $vacancy->delete();

        return Redirect::to('/vacancy');
    }

    public function update($id, Request $request)
    {

        $data = $request->all();

        $company = User::find(Auth::user()->id)->userable()->first()->id;

        $vacancyData = [
            'title' => $data['title'],
            'text' => $data['text'],
            'category_id' => $data['category_id'],
            'company_id' => $company,
        ];

        $vacancy = Vacancy::find($id);
        $vacancy->fill($vacancyData);
        $vacancy->save();
        $vacancy->competences()->sync($data['competence'], false);

        return Redirect::to('/vacancy');
    }


}
