<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id'=>Factory(\App\User::class),//creates a random user using user's factory method
        'title'=>$faker->sentence,
        'excerpt'=>$faker->sentence,
        'body'=>$faker->paragraph,
    ];
});
