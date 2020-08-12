<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Data\Models\User\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'city'  => $faker->city,
        'country'   => $faker->country,
        'postal_code' => $faker->postcode,
    ];
});
