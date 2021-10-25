<?php 

namespace Ikoncoder\Auth\Tests;

use Ikoncoder\Auth\UserFactory;
use PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase 
{
    /** @test */
	public function it_generate_a_random_user() 
	{
		$user = new UserFactory([
			'eric',
		]);
		$user = $user->getRandomUser();  //to random user names 
		
		//test that eric is one of the factory users
		$this->assertSame('eric',$user);
	}

	 /** @test */
	 public function it_generate_a_random_predefined_user() 
	 {  
		 $usernames =[
			 'dennis',
			 'mary',
			 'john',
			 'eric'
			];
		 $user = new UserFactory();

		 $user = $user->getRandomUser();  //to random user names 
		 
		 //test that eric is one of the factory users
		 $this->assertContains($user,$usernames);
	 }
}