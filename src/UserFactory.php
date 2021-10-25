<?php 

namespace Ikoncoder\Auth;

class UserFactory 
{   
		
	protected $users = [
        'eric',
        'john',
        'mary',
       
    ];

	public function __construct(array $users = null)
	{
		
		if($users){
			$this->users = $users;
		}
	}
	public function getRandomUser()
	{
		return $this->users[array_rand($this->users)];
	}
}
