<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class start_match extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'command:start_match';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
    {
        DB::delete('DELETE vc FROM vacancy_cvs vc
INNER JOIN cvs c ON vc.cv_id = c.id
INNER JOIN applicants a ON a.id = c.applicant_id
INNER JOIN users u ON u.userable_id = a.id
WHERE u.userable_type = "App\\\\Applicant"');


        $insert = DB::insert('INSERT INTO vacancy_cvs (cv_id, vacancy_id, num_matches)
SELECT cv.id AS "cv_id", v.id AS "vacancy_id", COUNT(com.id) AS "num_matches" FROM users u 
INNER JOIN applicants a ON u.userable_id = a.id
AND u.userable_type = "App\\\\Applicant"
INNER JOIN cvs cv ON cv.applicant_id = a.id
INNER JOIN cv_competence cc ON cc.cv_id = cv.id
INNER JOIN competences com ON cc.competence_id = com.id
AND com.id IN (
    SELECT com.id FROM vacancies v
	INNER JOIN cv_competence cc2 ON cc2.cv_id = v.id
    INNER JOIN competences com2 ON cc2.competence_id = com2.id
)
INNER JOIN vacancy_competence vc ON vc.competence_id = com.id
INNER JOIN vacancies v ON v.id = vc.vacancy_id
WHERE u.enabled = 1
AND NOT EXISTS (
	SELECT cv_id, vacancy_id FROM vacancy_cvs_payed
	WHERE cv_id = cv.id
	AND vacancy_id = v.id
)
GROUP BY cv.id, v.id');

		if($insert == 1) {
			echo "\n";
			echo "Matching complete!\n";
			echo "\n";
		}
    }
}
