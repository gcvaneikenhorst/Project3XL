<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Category;
use App\Competence;
use App\CV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

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

    public function cvValidator($data) {
        return Validator::make($data, [
            'title' => 'required|min:6',
            'text' => 'required',
            'video' => 'min:6',
            'motivation' => 'max:255',
            'category' => 'required',
        ]);
    }

    public function create() {
        return view('cv/create');
    }

    public function doCreate(Request $request) {
        $data = $request->all();

        $this->cvValidator($data)->validate();

        $cv = CV::create([
            'date'  => new \DateTime(),
            'title' => $data['title'],
            'text'  => $data['text'],
            'video' => $data['video'],
            'motivation' => $data['motivation'],
            'applicant_id' => Auth::user()->userable()->first()->id,
            'category_id' => $data['category'],
        ]);

        $cv->save();
        $cv->competences()->sync($data['competences'], false);

        return Redirect::to('/cv');
    }

    public function edit($id) {
        $cv = CV::find($id);

        $competences = $cv->competences()->get();

        $selectedCompetence = [];
        foreach ($competences as $competence) {
            $selectedCompetence[] = $competence->id;
        }

        return view('cv/edit', [
            'cv' => $cv,
            'selectedCompetence' => $selectedCompetence,
        ]);
    }

    public function doEdit($id, Request $request) {
        $data = $request->all();

        if($data['id'] != $id) {
            return Redirect::to('/cv');
        }

        $cv = CV::find($id);

        $this->cvValidator($data)->validate();

        $cv->fill([
            'title' => $data['title'],
            'text'  => $data['text'],
            'video' => $data['video'],
            'motivation' => $data['motivation'],
            'applicant_id' => Auth::user()->userable()->first()->id,
            'category_id' => $data['category'],
        ]);

        $cv->save();
        $cv->competences()->sync($data['competences'], false);

        return Redirect::to('/cv');
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
            return Redirect::to('/cv');
        }

        $cv = CV::find($id);
        $cv->delete();

        return Redirect::to('/cv');
    }
}
