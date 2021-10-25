# Ikoncoder auth 
create auth to manage users, roles and permissions in laravel framework project 

## Installation 
Require the package using composer: 
```bash 
composer require ikoncoder/auth 
``` 

## Usage 
```php 
use Ikoncoder\Auth\UserFactory;

$users = new UserFactory();

$user = $users->getRandomUser();
```

## Contributing 
Pull requests are welcome.
For major change to the app, please open an issue first and discuss what you would like to change.

Please be sure to make an update to the test as appropiate.

## License 
[MIT](./LICENSE.md)
