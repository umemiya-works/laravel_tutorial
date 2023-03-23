<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->word,
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});

$factory->state(Task::class, 'test', function  (Faker $Faker){
    return [
        'user_id' => 1,
    ];
});
