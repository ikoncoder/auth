<?php

namespace Ikoncoder\Auth\Console\Commands;

use Ikoncoder\Auth\Facades\AuthUser;
use Illuminate\Console\Command;

class AuthUser extends Command
{
    protected $signature = 'auth-user';

    protected $description = 'Output an auth user';

    public function handle()
    {
        $this->info(AuthUser::getRandomUser());
    }
}
