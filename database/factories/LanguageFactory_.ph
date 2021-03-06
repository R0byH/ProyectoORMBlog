<?php

use Faker\Generator as Faker;
use App\Models\Language;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Language::class, function (Faker $faker) {

    return [
        'label' => $faker->word,
        'iso6391' => $faker->languageCode,
    ];

});
