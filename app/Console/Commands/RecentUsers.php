<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class RecentUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recent_registered_users {nof_users=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns recent registered users';

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
        $nof_users = $this->argument('nof_users');
        $users = User::take($nof_users)->orderBy('created_at', 'DESC')->get();

        $this->info('Display users:');
        
        foreach($users as $user) {
            $this->info($user);
        }
        
    }
}
