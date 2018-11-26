<?php

use Faker\Generator as Faker;

$factory->define(\App\Group::class, function (Faker $faker) {
    $startDate = \Carbon\Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $endDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour(3);

    return [
        'name' => ucfirst($faker->safeColorName),
        'start_time' => $startDate,
        'end_time' => $endDate,
        'location' => $faker->address,
        'status' => 1,
    ];
});
