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
        factory(App\Applicant::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });


        factory(App\Company::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });

        factory(App\Admin::class,10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });
    }
}
