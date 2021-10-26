<?php 

namespace Ikoncoder\Auth\Tests;

use Orchestra\Testbench\TestCase;
use Ikoncoder\Auth\Console\Commands\AuthUser;
use Ikoncoder\Auth\Providers\IkoncoderAuthServiceProvider;

class LaravelTest extends TestCase 
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            IkoncoderAuthServiceProvider::class
        ];
    }

    /**
 * Override application aliases.
 *
 * @param  \Illuminate\Foundation\Application  $app
 *
 * @return array
 */
protected function getPackageAliases($app)
{
    return [
        'auth-user' => AuthUser::class
    ];
}

/** test */
public function the_console_command_retruns_a_name()
{ 
    $this->withoutMockingConsoleOuput(); 

    Authuser::shouldReceive('getRandomUser')
    ->once()
    -andReturn('eric');

	$this->artisan('auth-user');

	$output = Artisan::output();

	$this->assertSame('eric'.PHP_EOL, $output);
}

/**test */
public function the_route_can_be_accessed()
{
    $this->get('/auth-user')->assertStatus(200);
}




}