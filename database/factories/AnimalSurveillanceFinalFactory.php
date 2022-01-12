<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnimalSurveillanceFinal;
use Faker\Generator as Faker;

$factory->define(AnimalSurveillanceFinal::class, function (Faker $faker) {

    return [
        'upload_header_id' => $faker->randomDigitNotNull,
        'region' => $faker->word,
        'district' => $faker->word,
        'village' => $faker->word,
        'observation_date' => $faker->word,
        'disease' => $faker->word,
        'specie_affected' => $faker->word,
        'cases' => $faker->randomDigitNotNull,
        'death' => $faker->randomDigitNotNull,
        'not_at_rist' => $faker->randomDigitNotNull,
        'treated' => $faker->randomDigitNotNull,
        'destroyed' => $faker->randomDigitNotNull,
        'slaughtered' => $faker->randomDigitNotNull,
        'vaccinated' => $faker->randomDigitNotNull,
        'lat' => $faker->randomDigitNotNull,
        'long' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
