<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UploadHeader;
use Faker\Generator as Faker;

$factory->define(UploadHeader::class, function (Faker $faker) {

    return [
        'type' => $faker->randomDigitNotNull,
        'file_name' => $faker->word,
        'file_path' => $faker->word,
        'total_success' => $faker->randomDigitNotNull,
        'total_failed' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull
    ];
});
