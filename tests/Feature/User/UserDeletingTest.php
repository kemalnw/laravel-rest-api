<?php

namespace Tests\Feature\User;

use Illuminate\Http\Response;
use Tests\Concerns\UserTestTrait;
use Tests\TestCase;

class UserDeletingTest extends TestCase
{
    use UserTestTrait;

    /** @test */
    public function canDeleteSpecifiedUserTest()
    {
        $user = $this->createUser()->first();
        $response = $this->deleteJson(route('users.destroy', $user->id));

        $response->assertOk();

        $response->assertNoContent(Response::HTTP_OK);

        $this->assertDatabaseMissing('users', [
            '_id' => $user->id
        ]);
    }
}
