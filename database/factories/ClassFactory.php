<?php

use Faker\Generator as Faker;

$factory->define(App\Classes::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'user_id' => 1,
    ];
});
