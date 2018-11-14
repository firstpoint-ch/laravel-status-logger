<?php

use Faker\Generator as Faker;

$factory->define(\StatusLogger\Models\Status::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
