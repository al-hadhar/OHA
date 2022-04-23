<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Zones;
use Faker\Generator as Faker;

$factory->define(Zones::class, function (Faker $faker) {

    return [
        'name' => $faker->word
    ];
});
