<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RegionalZones;
use Faker\Generator as Faker;

$factory->define(RegionalZones::class, function (Faker $faker) {

    return [
        'zone_id' => $faker->randomDigitNotNull,
        'name' => $faker->word
    ];
});
