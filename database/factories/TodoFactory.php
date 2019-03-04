<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title'=> $faker->text(50),
        'description'=>$faker->text(200),
        'start_time'=> $faker->dateTime(),
        'end_time'=>$faker->dateTime(),
        'status'=>$faker->randomElement(['On progress','Completed'])
    ];
});
