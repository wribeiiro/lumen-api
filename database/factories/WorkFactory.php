<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Work;
use Faker\Generator as Faker;

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

$factory->define(Work::class, function (Faker $faker) {
    return [
        'client'        => $faker->name,
        'date_deploy'   => date('Y-m-d'),
        'description'   => $faker->title,
        'link'          => $this->faker->url,
        'image'         => $this->faker->imageUrl($width = 640, $height = 480),
        'class'         => $this->faker->word,
        'tags'          => $this->faker->word,
    ];
});
