<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Applicant;
use Validator;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function settingsValidator(array $data)
    {
        $isApplicant    = Auth::user()->userable_type == 'App\Applicant';
        $isCompany      = Auth::user()->userable_type == 'App\Company';

        $validators = [];

        switch (true) {
            case $isApplicant:

                $validators = array_merge($validators, [
                    'salutation' => 'required|max:255',
                    'firstname' => 'required|max:255',
                    'lastname'  => 'required|max:255',
                    'insertion' => 'max:255',
                    'address'   => 'required|max:255',
                    'zipcode'   => 'required|max:6',
                    'location'  => 'required|max:255',
                    'phone'     => 'required|max:10',
                ]);

                break;
            case $isCompany:

                $validators = array_merge($validators, [
                    'name'      => 'required|max:255',
                    'address'   => 'required|max:255',
                    'zipcode'   => 'required|max:6',
                    'city'      => 'required|max:255',
                    'phone'     => 'required|max:10',
                    'contactperson' => 'required|max:255',
                    'email'     => 'required|email|max:255',
                    'website'   => 'required|max:255',
                ]);

                break;
        }

        return Validator::make($data, $validators);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings() {
        return view('settings/settings');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settingsSave(Request $request)
    {
        $data = $request->all();

        $isApplicant    = Auth::user()->userable_type == 'App\Applicant';
        $isCompany      = Auth::user()->userable_type == 'App\Company';

        $this->settingsValidator($data)->validate();

        $user = User::find(Auth::user()->id);


        switch (true) {
            case $isApplicant:
                
                $applicant = Applicant::find(Auth::user()->userable()->first()->id);

                $applicant->salutation   = $data['salutation'];
                $applicant->firstname    = $data['firstname'];
                $applicant->lastname     = $data['lastname'];
                $applicant->insertion    = $data['insertion'];
                $applicant->address      = $data['address'];
                $applicant->zipcode      = $data['zipcode'];
                $applicant->location     = $data['location'];
                $applicant->phone        = $data['phone'];

                $applicant->save();

                break;
            case $isCompany:

                $company = Company::find(Auth::user()->userable()->first()->id);

                $company->name             = $data['name'];
                $company->address          = $data['address'];
                $company->zipcode          = $data['zipcode'];
                $company->city             = $data['city'];
                $company->phone            = $data['phone'];
                $company->contactperson    = $data['contactperson'];
                $company->email            = $data['contactemail'];
                $company->website          = $data['website'];

                $company->save();

                break;
        }

        $user->save();

        return Redirect::to('/account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function emailValidator(array $data) {
        return Validator::make($data, [
            'email' => 'required|email|max:255|confirmed',
            'email_confirmation' => 'required|email|max:255',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function email(Request $request) {
        return view('settings/email');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailSave(Request $request) {
        $data = $request->all();

        $this->emailValidator($data)->validate();

        $user = User::find(Auth::user()->id);

        $user->email = $data['email'];
        $user->save();

        return Redirect::to('/account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function passwordValidator(array $data) {
        return Validator::make($data, [
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function password() {
        return view('settings/password');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordSave(Request $request) {
        $data = $request->all();

        $this->passwordValidator($data)->validate();

        $user = User::find(Auth::user()->id);

        $user->password = bcrypt($data['password']);
        $user->save();

        return Redirect::to('/account');
    }
}
