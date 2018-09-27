<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'author_id' => $faker->numberBetween(1, 47),
        'slug' => str_slug($faker->text(100)),
        'body' => $faker->realText(300),
    ];
});
