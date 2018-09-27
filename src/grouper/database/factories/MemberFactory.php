<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'middle_name' => '',
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email,
        'phone_number' => $faker->phoneNumber,
        'company' => $faker->company,
    ];
});
