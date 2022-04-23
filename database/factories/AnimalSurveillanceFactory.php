<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnimalSurveillance;
use Faker\Generator as Faker;

$factory->define(AnimalSurveillance::class, function (Faker $faker) {

    return [
        'upload_header_id' => $faker->randomDigitNotNull,
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
        'status' => $faker->randomDigitNotNull,
        'valid_status' => $faker->randomDigitNotNull,
        'reject_reason' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
