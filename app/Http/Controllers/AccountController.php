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

    public function dangerzone(Request $request) {
        if ($request->isMethod("post")) {
            $user = User::find(Auth::user()->id);
            switch ($request->get('action')) {
                case "remove": {
                    if ($request->get("sure") == "no")
                        return Redirect("/");

                    $user->userable()->delete();
                    $user->delete();
                    Auth::logout();
                    break;
                }
                case "deactivate": {
                    $user->enabled = false;
                    $user->save();
                    Auth::logout();
                    break;
                }
            }

            return Redirect("/");
        }
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
