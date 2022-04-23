<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Regions;
use Faker\Generator as Faker;

$factory->define(Regions::class, function (Faker $faker) {

    return [
        'zone_id' => $faker->randomDigitNotNull,
        'name' => $faker->word
    ];
});
