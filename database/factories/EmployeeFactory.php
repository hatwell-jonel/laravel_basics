<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\Helper\Helper;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $helper = new Helper();

    return [
        'employee_id' => $helper->generateEmployeeId(),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'gender' => $faker->randomElement(['F', 'M']),
        'birthdate' => $faker->date(),
        'monthly_salary' => $faker->randomFloat(2, 1000, 10000),
    ];
});
