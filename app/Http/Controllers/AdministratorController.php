<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Http\Controllers\Controller;

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

}