<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnimalSurveillance;
use Faker\Generator as Faker;

$factory->define(AnimalSurveillance::class, function (Faker $faker) {

    return [
        'region' => $faker->word,
        'district' => $faker->word,
        'village' => $faker->word,
        'observation_date' => $faker->word,
        'disease' => $faker->word,
        'specie_affected' => $faker->word,
        'cases' => $faker->word,
        'death' => $faker->word,
        'not_at_rist' => $faker->word,
        'treated' => $faker->word,
        'destroyed' => $faker->word,
        'slaughtered' => $faker->word,
        'vaccinated' => $faker->word,
        'lat' => $faker->randomDigitNotNull,
        'long' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull
    ];
});
