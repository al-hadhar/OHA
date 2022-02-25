<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HumanSurveillanceFinal;
use Faker\Generator as Faker;

$factory->define(HumanSurveillanceFinal::class, function (Faker $faker) {

    return [
        'id' => $faker->randomDigitNotNull,
        'upload_header_id' => $faker->randomDigitNotNull,
        'organisation_unit_name' => $faker->word,
        'organisation_unit_code' => $faker->word,
        'disease' => $faker->word,
        'one_month_to_below_one_year' => $faker->randomDigitNotNull,
        'one_to_below_five_years' => $faker->randomDigitNotNull,
        'five_to_below_sixty_years' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
