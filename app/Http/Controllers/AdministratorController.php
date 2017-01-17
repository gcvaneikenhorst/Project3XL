<?php

namespace App\Http\Controllers;

use App\Category;
use App\Competence;
use App\User;
use App\CV;
use App\Http\Controllers\Controller;
use App\Vacancy;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{

    public function __constructor() {
        $this->middleware("auth", []);
    }

    public function viewUsers() {
        $users = User::paginate(15);

        return View("administrator/viewusers", ["users" => $users]);
    }

    public function viewCvs($userid) {
        $user = User::find($userid);

        // Only Applicants can have CV's
        if ($user->userable_type != "App\\Applicant")
            return Redirect("administrator/viewusers");

        $email = $user->email;
        $cvs = $user->userable()->first()->cvs()->get();


        $categories = Category::get();
        return View("administrator/viewcvs", ["cvs" => $cvs, 'email' => $email, 'categories' => $categories]);
    }

    public function viewVacancy($userid) {
        $user = User::find($userid);

        // Only Applicants can have CV's
        if ($user->userable_type != "App\\Company")
            return Redirect("administrator/viewusers");

        $email = $user->email;
        $vacancies = $user->userable()->first()->vacancies()->get();
        $categories = Category::get();
        return View("administrator/viewvacancy", ["vacancies" => $vacancies, 'email' => $email, 'categories' => $categories]);
    }

    public function viewCompetences() {
        $competences = Competence::all();
        return View("administrator/viewcompetences", ['competences' => $competences]);
    }


    public function updateUserData(Request $request, $userid) {
        $data = $request->json()->all();
        $userInfo = User::find($userid)->userable();
        $userInfo->update($data);

        return ['success' => 'true'];
    }

    public function updateCVData(Request $request, $cvid) {
        $data = $request->json()->all();
        $cv = CV::find($cvid);
        $cv->update($data);
        return ['success' => 'true'];
    }

    public function updateVacancyData(Request $request, $vacancyid) {
        $data = $request->json()->all();
        $vacancy = Vacancy::find($vacancyid);
        $vacancy->update($data);
        return ['success' => 'true'];
    }

    public function updateCompetenceData(Request $request, $competenceid) {
        $data = $request->json()->all();
        $competence = Competence::find($competenceid);
        $competence->update($data);
        return ['success' => 'true'];
    }


    public function createCompetence(Request $request) {
        $data = $request->json()->all();
        Competence::insert($data);
    }


    public function deleteUser($userid) {
        $user = User::find($userid);
        $user->userable()->delete();
        $user->delete();
    }


    public function deleteCv($cvid) {
        $cv = CV::find($cvid);
        $cv->delete();
    }

    public function deleteVacancy($vacancyid) {
        $vacancy = Vacancy::find($vacancyid);
        $vacancy->delete();
    }


    public function deleteCompetence($competenceid) {
        $competence = Competence::find($competenceid);
        $competence->delete();
    }


}