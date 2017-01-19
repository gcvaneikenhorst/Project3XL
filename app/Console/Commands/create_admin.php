<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Admin;

class create_admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create_admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new admin';

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
        $user = User::create([
            'email' => 'admin@tripplexl.com',
            'password' => bcrypt('NeverGonnaGiveYouUpNeverGonnaLetYouDown'),
            'enabled' => true,
            'api_token' => str_random(60),
        ]);
        $admin = Admin::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'insertion' => 'Admin',
            'address' => 'Admin',
            'zipcode' => '0000AA',
            'location' => '_No_Adres_',
            'phone' => '0000000',
            'email' => 'admin@tripplexl.com'
        ]);
        $admin->save();
        $admin->user()->save($user);
    }
}
