<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\CV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CVController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = Applicant::find(Auth::user()->userable()->first()->id)->cvs()->get();

        return view('cv/index', ['cvs' => $cvs]);
    }

    public function create() {
        return view('cv/create');
    }

    public function edit($id) {
        $cv = CV::find($id);

        return view('cv/edit', [
            'cv' => $cv,
        ]);
    }

    public function doEdit($id, Request $request) {
        $data = $request->all();

        if($data['id'] != $id) {
            return Redirect::to('/cv/edit');
        }

        dd('EDIT');
    }

    public function delete($id) {
        $cv = CV::find($id);

        return view('cv/delete', [
            'cv' => $cv,
        ]);
    }

    public function doDelete($id, Request $request) {
        $data = $request->all();
        
        if($data['id'] != $id) {
            return Redirect::to('/cv/delete');
        }

        dd('DELETE');
    }
}
