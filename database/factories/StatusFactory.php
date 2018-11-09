<?php

use Faker\Generator as Faker;

$factory->define(\StatusHistory\Models\Status::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
