<?php

namespace Tests\Feature\User;

use Tests\Concerns\UserTestTrait;
use Tests\TestCase;

class UserUpdatingTest extends TestCase
{
    use UserTestTrait;

    /** @test */
    public function canUpdatingSpecifiedUserTest()
    {
        $user = $this->createUser()->first();

        $formData = $this->getFields();
        $formData['address']['id'] = $user->address->id;

        $response = $this->putJson(
            route('users.update', ['user' => $user->id]),
            $formData
        );

        $response->assertOk();

        $response->assertJsonStructure($this->getJsonStructure());

        $this->assertDatabaseHas('users', [
            'first_name' => $formData['first_name'],
            'last_name' => $formData['last_name'],
            'email' => $formData['email'],
            'phone' => $formData['phone'],
        ]);

        $this->assertDatabaseHas('addresses', [
            '_id' => $formData['address']['id'],
            'street' => $formData['address']['street'],
            'city' => $formData['address']['city'],
            'country' => $formData['address']['country'],
            'postal_code' => $formData['address']['postal_code'],
        ]);
    }
}
