<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applicants = factory(App\Applicant::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });


        $companies = factory(App\Company::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });

        $admins = factory(App\Admin::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });

        $competence = factory(\App\Competence::class)->create();
        $category = factory(\App\Category::class)->create();


        $cvs = [];


        foreach ($applicants as $applicant){
            
        }

    }
}
