# LARAVEL 7 - MYSQL

---

## Create using

-   Laravel Auth
-   Bootstrap 5
-   CRUD
-   Yajra Datable
-   Ajax
-   Jquery
-   Blade

### Make

`php artisan make:{whatEver}`

to view all shortcut flag use:

`php artisan make:{whatEver} --help`

### How to create fake data

1. Create a Factory:
   `php artisan make:factory {NameFactory}`

2. Modify the Factory file:

```php
<?php

/\*_ @var \Illuminate\Database\Eloquent\Factory $factory _/

use App\Employee;
use App\Helper\Helper;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $helper = new Helper();

    return [
        'employee_id' => $helper->generateEmployeeId(),
        'firstname' => $faker->firstame,
        'lastname' => $faker->lastName,
        'gender' => $faker->randomElement(['F', 'M']),
        'birthdate' => $faker->date(),
        'monthly_salary' => $faker->randomFloat(2, 1000, 10000),
    ];

});
```

3. In database\seeds\DatabaseSeeder.php initialize the factory:

```php
  public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create();
        factory(App\Employee::class, 10)->create();
    }
```

## Author

-   LinkedIn - [Jonel Hatwell](https://www.linkedin.com/in/jonel-hatwell/)
