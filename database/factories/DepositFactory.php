<?php

use Faker\Generator as Faker;

$factory->define(App\Deposit::class, function (Faker $faker) {
    return [
      'user_id' => 1,
      'amount' => $faker->numberBetween($min = 10, $max = 500)
    ];
});
