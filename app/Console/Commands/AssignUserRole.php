<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AssignUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:user-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign the "usuario" role to all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->assignRole('usuario');
        }

        $this->info('Role "usuario" has been assigned to all users.');

        return 0;
    }
}
