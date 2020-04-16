<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conversation;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    return [
            'user_id'=>Factory(\App\User::class),
            'title'=>$faker->sentence,
            'body'=>$faker->sentence,
    ];
});
