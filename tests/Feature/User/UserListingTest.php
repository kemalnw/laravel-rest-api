<?php

namespace Feature\User;

use Tests\TestCase;
use Tests\Concerns\UserTestTrait;

class UserListingTest extends TestCase
{
    use UserTestTrait;

    /** @test */
    public function canGetListOfUsersTest()
    {
        $this->createUser(10);

        $response = $this->getJson(route('users.index'));

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [$this->getJsonStructure()],
            'meta' => []
        ]);

        $response->assertJsonCount(10, 'data');
    }
}
