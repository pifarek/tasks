<?php

use Faker\Generator as Faker;
use App\Facades\Generator;
use App\Task;

$factory->define(App\Task::class, function (Faker $faker) {
    // Generate unique Hash
    $hash = Generator::random();

    while(Task::where('hash', $hash)->first()) {
        $hash = Generator::random();
    }

    return [
        'status' => rand(0, 1)? 'completed' : 'pending',
        'content' => $faker->sentence(),
        'hash' => $hash,
        'finish_at' => $faker->dateTimeThisYear('+1 year'),
    ];
});
