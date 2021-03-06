<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Competence;
use App\User;
use App\CV;
use App\Http\Controllers\Controller;
use App\Vacancy;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    private function getAPIToken() {
        return User::find(Auth::user()->id)->api_token;
    }
    public function __constructor()
    {
        $this->middleware("auth", []);
    }


    public function viewUsers() {
        $users = User::paginate(15);

        return View("administrator/viewusers", ["users" => $users, 'api_token' => $this->getAPIToken()]);
    }

    public function viewCvs($userid) {
        $user = User::find($userid);

        // Only Applicants can have CV's
        if ($user->userable_type != "App\\Applicant")
            return Redirect("administrator/viewusers");

        $email = $user->email;
        $cvs = $user->userable()->first()->cvs()->get();


        $categories = Category::get();
        return View("administrator/viewcvs", ["cvs" => $cvs, 'email' => $email, 'categories' => $categories, 'api_token' => $this->getAPIToken()]);
    }

    public function viewVacancy($userid) {
        $user = User::find($userid);

        // Only Applicants can have CV's
        if ($user->userable_type != "App\\Company")
            return Redirect("administrator/viewusers");

        $email = $user->email;
        $vacancies = $user->userable()->first()->vacancies()->get();
        $categories = Category::get();
        return View("administrator/viewvacancy", ["vacancies" => $vacancies, 'email' => $email, 'categories' => $categories, 'api_token' => $this->getAPIToken()]);
    }

    public function viewCompetences() {
        $competences = Competence::all();
        return View("administrator/viewcompetences", ['competences' => $competences, 'api_token' => $this->getAPIToken()]);
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
        return ['success' => 'true'];
    }


    private static function validateAdministratorData($data) {
        $validators = [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'salutation' => 'required|max:255',
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'insertion' => 'max:255',
            'address'   => 'required|max:255',
            'zipcode'   => 'required|max:6',
            'location'  => 'required|max:255',
            'phone'     => 'required|max:10',
        ];
        return Validator::make($data, $validators);
    }


    public function createAdministrator(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->toArray();
            self::validateAdministratorData($data)->validate();
            $user = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'enabled' => true,
                'api_token' => str_random(60),
            ]);
            $admin = Admin::create($data);
            $admin->save();
            $admin->user()->save($user);
            return View('administrator/createadmin', ['success' => true]);
        }
        return View('administrator/createadmin', ['success' => false]);
    }


    public function deleteUser($userid) {
        $user = User::find($userid);
        $user->userable()->delete();
        $user->delete();
        return ['success' => 'true'];
    }


    public function deleteCv($cvid) {
        $cv = CV::find($cvid);
        $cv->delete();
        return ['success' => 'true'];
    }

    public function deleteVacancy($vacancyid) {
        $vacancy = Vacancy::find($vacancyid);
        $vacancy->delete();
        return ['success' => 'true'];
    }
    
    public function deleteCompetence($competenceid) {
        $competence = Competence::find($competenceid);
        $competence->delete();
        return ['success' => 'true'];
    }
}