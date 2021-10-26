<?php

namespace Ikoncoder\Auth\Tests;

use Ikoncoder\Auth\Console\Commands\AuthUser;
use Ikoncoder\Auth\Providers\IkoncoderAuthServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            IkoncoderAuthServiceProvider::class,
        ];
    }

    /**
     * Override application aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'auth-user' => AuthUser::class,
        ];
    }

    /** test */
    public function the_console_command_retruns_a_name()
    {
        $this->withoutMockingConsoleOuput();

        Authuser::shouldReceive('getRandomUser')
    ->once()
    - andReturn('eric');

        $this->artisan('auth-user');

        $output = Artisan::output();

        $this->assertSame('eric'.PHP_EOL, $output);
    }

    /**test */
    public function the_route_can_be_accessed()
    {
        $this->get('/auth-user')
         ->assertViewIs('auth-user::user')
         ->assertViewHas('name', 'eric')
         ->assertStatus(200);
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_admins_table.php.stub';
        (new \CreateAdminsTable)->up();
    }

    public function it_can_access_the_database()
    {
        $user = new  User();
        $user->user = 'eric';
        $user->save();

        $newUser = User::find($user->id);

        $this->assertSame($newUser->user, 'eric');
    }
}
