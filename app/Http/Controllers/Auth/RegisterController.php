<?php

namespace App\Http\Controllers\Auth;

use App\Applicant;
use App\Company;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $isApplicant =  $data['user_type'] == 1;
        $isCompany =    $data['user_type'] == 2;

        $validators = [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];

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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $isApplicant =  $data['user_type'] == 1;
        $isCompany =    $data['user_type'] == 2;

        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        switch (true) {
            case $isApplicant:

                $applicant = Applicant::create([
                    'salutation' => $data['salutation'],
                    'firstname' => $data['firstname'],
                    'lastname'  => $data['lastname'],
                    'insertion' => $data['insertion'],
                    'address'   => $data['address'],
                    'zipcode'   => $data['zipcode'],
                    'location'  => $data['location'],
                    'phone'     => $data['phone'],
                ]);

                $applicant->save();
                $applicant->user()->save($user);

                break;
            case $isCompany:

                $company = Company::create([
                    'name'      => $data['name'],
                    'address'   => $data['address'],
                    'zipcode'   => $data['zipcode'],
                    'city'      => $data['city'],
                    'phone'     => $data['phone'],
                    'contactperson' => $data['contactperson'],
                    'email'     => $data['email'],
                    'website'   => $data['website'],
                ]);

                $company->save();
                $company->user()->save($user);

                break;
        }

        return $user;
    }
}
