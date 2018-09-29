<?php

use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {
    $startDate = \Carbon\Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $endDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour(3);

    return [
        'name' => $faker->monthName,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'status' => 1,
    ];
});
