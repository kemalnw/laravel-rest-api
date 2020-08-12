<?php

namespace Tests\Feature\User;

use App\Data\Models\User\User;
use Tests\Concerns\UserTestTrait;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserCreatingTest extends TestCase
{
    use UserTestTrait;

    /** @test */
    public function canCreatingNewUserTest()
    {
        $response = $this->postJson(route('users.store'), $this->getFields());

        $response->assertCreated();

        $response->assertJsonStructure($this->getJsonStructure());

        $this->assertDatabaseHas('users', [
            '_id' => $response->decodeResponseJson()['id']
        ]);
    }

    public function userFormValidationDataProvider() : array
    {
        return [
            ['first_name', ['first_name' => '']],
            ['first_name', ['first_name' => 354]],
            ['last_name', ['last_name' => 313]],
            ['email', ['email' => '']],
            ['email', ['email' => 'wrong email formated']],
            ['email', ['email' => 'helo@kemalnw.id']],
            ['phone', ['phone' => '']],
        ];
    }

    /**
     * @test
     * @dataProvider userFormValidationDataProvider
     */
    public function userCreateFormValidationTest($field, $override)
    {
        if ($field === 'email') {
            factory(User::class)->create(['email' => 'helo@kemalnw.id']);
        }

        $response = $this->postJson(route('users.store'), $this->getFields($override));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonValidationErrors($field);
    }
}
