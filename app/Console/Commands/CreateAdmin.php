<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {name=admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user with admin-level access';

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
     * @param string name
     * @return int
     */
    public function handle(string $name)
    {
        $user = new User();
        $user->password = Hash::make('admin');
        $user->email = 'admin@admin.com';
        $user->name = 'admin';
        $user->is_admin = 1;
        $user->save();
        return 0;
    }
}
