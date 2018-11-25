<?php

use Faker\Generator as Faker;
use App\Models\CitiesVariableRule;
use App\Models\City;

$factory->define(CitiesVariableRule::class, function (Faker $faker) {
    return [
        'city_id' => $faker->unique()->randomElement(City::pluck('id')),
        'rule' => $faker->word
    ];
});
