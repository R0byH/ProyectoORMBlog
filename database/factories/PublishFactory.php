<?php

use Faker\Generator as Faker;
use App\Models\Publish;

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

$factory->define(Publish::class, function (Faker $faker) {  //la clave es la clase

    return [
       'slug' =>$faker->slug,
       'label' =>$faker->unique()->word,
       'is_publish' =>$faker->boolean($chanceOfGettingTrue=50),
       
    ];
});