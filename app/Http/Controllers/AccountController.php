<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function removeAccount(Request $request) {
        //var_dump("Test", Auth::check());
        //if (!Auth::check())
        if ($request->isMethod("post")) {
            if ($request->get("sure") == "no")
                return Redirect("/");

            $user = User::find(Auth::user()->id);
            $user->userable()->delete();
            $user->delete();
            return Redirect("/");
        }
        //DB::connection('user')
        return View("account/dangerzone");
    }
    
    public function deactivateAccount(Request $request)
    {
	    if ($request->isMethod("post")) {
            if ($request->get("sure") == "no")
                return Redirect("/");
				$user = User::find(Auth::user()->id);
				$user->enabled = false;
				$user->save();
            return Redirect("/");
        }
        return View("account/dangerzone");
    }
}
