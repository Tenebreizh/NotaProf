<?php

use Faker\Generator as Faker;

$factory->define(App\Sentence::class, function (Faker $faker) {
    return [
        'name'    => $faker->word(),
        'content' => $faker->sentence(rand(3, 12)),
        'user_id' => 1,
    ];
});
