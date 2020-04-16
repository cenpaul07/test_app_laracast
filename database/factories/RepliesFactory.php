<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'conversation_id'=>factory(App\Conversation::class),
        'comment'=>$faker->sentence
    ];
});
