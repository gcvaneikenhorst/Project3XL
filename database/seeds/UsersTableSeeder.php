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
        $applicants = factory(App\Applicant::class, 10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });


        $companies = factory(App\Company::class, 10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });

        $admins = factory(App\Admin::class, 10)->create()->each(function ($u) {
            $u->user()->save(factory(App\User::class)->make());
        });

        $competence1 = factory(\App\Competence::class,5)->create();
        $competence2 = factory(\App\Competence::class,5)->create();


        $category = factory(\App\Category::class,10)->create();


        $cv1 = [];
        $cv2 = [];
        for ($i = 0; $i < 5; $i++) {
            $cv = factory(\App\CV::class)->create(['applicant_id' => $applicants[$i]->id, 'category_id' => $category[0]->id]);
            foreach ($competence1 as $competence)
            {
                $cv->competences()->save($competence);
            }
            array_push($cv1,$cv);
        }

        for ($i = 5; $i < 10; $i++) {
            $cv = factory(\App\CV::class)->create(['applicant_id' => $applicants[$i]->id, 'category_id' => $category[1]->id]);
            foreach ($competence1 as $competence)
            {
                $cv->competences()->save($competence);
            }
            array_push($cv2,$cv);
        }

        $vacancy1 = [];
        $vacancy2 = [];

        for ($i = 0; $i < 5; $i++) {
            $cv = factory(\App\Vacancy::class)->create(['company_id' => $companies[$i]->id, 'category_id' => $category[0]->id]);
            foreach ($competence1 as $competence)
            {
                $cv->competences()->save($competence);
            }
            array_push($vacancy1,$cv);
        }

        for ($i = 5; $i < 10; $i++) {
            $cv = factory(\App\Vacancy::class)->create(['company_id' => $companies[$i]->id, 'category_id' => $category[1]->id]);
            foreach ($competence1 as $competence)
            {
                $cv->competences()->save($competence);
            }
            array_push($vacancy2,$cv);
        }

        foreach ($cv1 as $cv){
            foreach ($vacancy1 as $vacancy){
                $cv->vacancies()->save($vacancy);
            }
        }
        foreach ($cv2 as $cv){
            foreach ($vacancy2 as $vacancy){
                $cv->vacancies()->save($vacancy);
            }
        }


    }
}
