<?php

use Faker\Generator as Faker;
use App\Enums\CitiesVariableDefaultValues;
use App\Enums\CitiesVariableDefaultFieldNames;
use App\Models\CitiesVariable;

$factory->define(CitiesVariable::class,
                 function (Faker $faker) {
    $defaultValue = $faker->randomElement(CitiesVariableDefaultValues::values());
    return [
        'name' => $faker->word,
        'code' => 'city_' . str_replace('-', '_', $faker->unique()->slug(2)),
        'default_value' => $defaultValue,
        'default_fixed_value' => $defaultValue == CitiesVariableDefaultValues::FIXED ? $faker->word : null,
        'default_field_name' => $defaultValue == CitiesVariableDefaultValues::FIELD ? $faker->randomElement(CitiesVariableDefaultFieldNames::values()) : null
    ];
});
