<?php

namespace Tests\Concerns;

use App\Data\Models\User\User;
use App\Data\Models\User\Address;
use Illuminate\Foundation\Testing\WithFaker;

trait UserTestTrait
{
    use WithFaker;

    private function createUser($amount = 1, $overrides = [])
    {
        $user = factory(User::class, $amount)->create($overrides);

        $user->each(function($user) {
            $user->address()->save(factory(Address::class)->create());
        });

        return $user;
    }

    private function getFields($overrides = []) : array
    {
        return array_merge([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => [
                'street' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'country' => $this->faker->country,
                'postal_code' => $this->faker->postcode,
            ]
        ], $overrides);
    }

    private function getJsonStructure() : array
    {
        return [
            'type',
            'id',
            'attributes' => [
                'first_name',
                'last_name',
                'email',
                'phone',
            ],
            'relationships' => [
                'address' => [
                    'type',
                    'id',
                    'attributes' => [
                        'street',
                        'city',
                        'country',
                        'postal_code'
                    ]
                ]
            ]
        ];
    }
}
