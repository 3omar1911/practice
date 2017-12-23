<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        
        'title' => $faker->title,
        'content' => $faker->sentence(50),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
