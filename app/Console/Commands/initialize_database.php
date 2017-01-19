<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class initialize_database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:initialize_database';

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

        $queries = '
-- Used to store the information for the companies
CREATE TABLE companies (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	`address` VARCHAR(255),
	`zipcode` VARCHAR(6),
	`city` VARCHAR(255),
	`phone` VARCHAR(255),
	`contactperson` VARCHAR(255),
	`email` VARCHAR(255),
	`website` VARCHAR (255)
) engine=innodb;

-- Used to store the information for the applicants
CREATE TABLE applicants (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`salutation` VARCHAR(255),
	`firstname` VARCHAR(255),
	`lastname` VARCHAR(255),
	`insertion` VARCHAR(255),
	`address` VARCHAR(255),
	`zipcode` VARCHAR(255),
	`location` VARCHAR(255),
	`phone` VARCHAR(255),
	`email` VARCHAR(255)
) engine=innodb;

-- Used to store the job categories
CREATE TABLE categories (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	`description` VARCHAR(2000)
) engine=innodb;

-- Used to store the Cvs of the applicants
CREATE TABLE cvs (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`date` DATETIME,
	`title` VARCHAR(255),
	`text` VARCHAR(8000),
	`applicant_id` INT UNSIGNED,
	`video` VARCHAR(500),
	`motivation` VARCHAR(255),
	`category_id` INT UNSIGNED,
	CONSTRAINT FOREIGN KEY(`applicant_id`) REFERENCES applicants(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`category_id`) REFERENCES categories(id) ON DELETE CASCADE
) engine=innodb;


-- Used to store the vacancies created by companies.
CREATE TABLE vacancies (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`date` DATETIME,
	`title` VARCHAR(255),
	`text` VARCHAR(8000),
	`company_id` INT UNSIGNED,
	`category_id` INT UNSIGNED,
	CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES companies(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`category_id`) REFERENCES categories(id) ON DELETE CASCADE
) engine=innodb;

-- Used to store the information for admins
CREATE TABLE admins (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`firstname` VARCHAR(255),
	`lastname` VARCHAR(255),
	`insertion` VARCHAR(255),
	`address` VARCHAR(255),
	`zipcode` VARCHAR(255),
	`location` VARCHAR(255),
	`phone` VARCHAR(255),
	`email` VARCHAR(255)
) engine=innodb;

-- Used to store the competences that will be used by both the cvs and vacancies.
CREATE TABLE competences (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	`description` VARCHAR(2000)
) engine=innodb;

-- Used to store the users
CREATE TABLE users (
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`api_token` VARCHAR(60) UNIQUE,
	`email` VARCHAR(255),
	`password` VARCHAR(255),
	`userable_id` INT UNSIGNED,
	`userable_type` VARCHAR(255),
	`enabled` BOOLEAN,
	`remember_token` VARCHAR(200)
) engine=innodb;

-- Used to link the vacancies to the cvs
CREATE TABLE vacancy_cvs (
	`cv_id` INT UNSIGNED,
	`vacancy_id` INT UNSIGNED,
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`num_matches` INT UNSIGNED,
	UNIQUE(`cv_id`, `vacancy_id`),
	CONSTRAINT FOREIGN KEY(`cv_id`) REFERENCES cvs(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`vacancy_id`) REFERENCES vacancies(id) ON DELETE CASCADE
) engine=innodb;

-- Used to link the vacancies to the cvs
CREATE TABLE vacancy_cvs_payed (
	`cv_id` INT UNSIGNED,
	`vacancy_id` INT UNSIGNED,
	`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`num_matches` INT UNSIGNED,
	UNIQUE(`cv_id`, `vacancy_id`),
	CONSTRAINT FOREIGN KEY(`cv_id`) REFERENCES cvs(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`vacancy_id`) REFERENCES vacancies(id) ON DELETE CASCADE
) engine=innodb;

-- Used to link the vacancies to competences
CREATE TABLE vacancy_competence (
	`vacancy_id` INT UNSIGNED,
	`competence_id` INT UNSIGNED,
	PRIMARY KEY(`competence_id`, `vacancy_id`),
	CONSTRAINT FOREIGN KEY(`competence_id`) REFERENCES competences(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`vacancy_id`) REFERENCES vacancies(id) ON DELETE CASCADE
) engine=innodb;


-- Used to link the cvs to the competences
CREATE TABLE cv_competence (
	`competence_id` INT UNSIGNED,
	`cv_id` INT UNSIGNED,
	PRIMARY KEY(`competence_id`, `cv_id`),
	CONSTRAINT FOREIGN KEY(`competence_id`) REFERENCES competences(id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY(`cv_id`) REFERENCES cvs(id) ON DELETE CASCADE
) engine=innodb;';

        foreach (explode(';', $queries) as $query) {
            DB::statement($query);
        }
    }
}
