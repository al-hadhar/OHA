<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Councils;
use Faker\Generator as Faker;

$factory->define(Councils::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'region_id' => $faker->randomDigitNotNull
    ];
});
