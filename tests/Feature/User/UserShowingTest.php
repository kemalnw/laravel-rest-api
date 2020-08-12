<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Tests\Concerns\UserTestTrait;

class UserShowingTest extends TestCase
{
    use UserTestTrait;

    /** @test */
    public function canGetUserDataTest()
    {
        $user = $this->createUser()->first();

        $response = $this->getJson(route('users.show', $user->id));

        $response->assertOk();

        $response->assertJsonStructure($this->getJsonStructure());
    }
}
