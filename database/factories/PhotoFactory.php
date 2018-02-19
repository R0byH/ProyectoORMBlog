<?php

use Faker\Generator as Faker;
use App\Models\Photo;

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

$factory->define(Photo::class, function (Faker $faker) {
    $types = [
        "jpg",
    ];

        return [
        //
        'filename' =>$faker->unique()->image('public/images',150,150, null, false), 
            //$faker->imageUrl(50,50),
        'type'=> $types [array_rand($types,1)],
    ];
});
