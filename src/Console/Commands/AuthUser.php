<?php

namespace Ikoncoder\Auth\Console\Commands;

use Illuminate\Console\Command;
use Ikoncoder\Auth\Facades\AuthUser;

class AuthUser extends Command
{
    protected $signature = 'auth-user';

    protected $description = 'Output an auth user';

    public function handle()
    {
        $this->info(AuthUser::getRandomUser());
    }
}
