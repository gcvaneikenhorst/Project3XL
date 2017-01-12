<?php

namespace App\Http\Controllers;

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

}