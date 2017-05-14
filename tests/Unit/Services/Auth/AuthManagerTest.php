<?php

namespace Tests\Unit\Services\Auth;


use App\Services\Auth\AuthManager;
use App\Services\Auth\TokenStorageInterface;
use App\User;
use Tests\TestCase;

class AuthManagerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUserWhenNoToken()
    {
        $tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();

        $tokenStorage->method('getToken')->willReturn(null);

        $tokenStorage->method('generateToken')->willReturn('token');

        $authManager = new AuthManager($tokenStorage);

        $user = $authManager->getUser();

        $this->assertEquals('token', $user->token);
        $this->assertDatabaseHas('users', ['token' => $user->token]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUserWhenTokenExists()
    {
        $tokenStorage = $this->getMockBuilder(TokenStorageInterface::class)->getMock();

        $existedUser = factory(User::class)->create();

        $tokenStorage->method('getToken')->willReturn($existedUser->token);

        $authManager = new AuthManager($tokenStorage);

        $user = $authManager->getUser();

        $this->assertEquals($existedUser->id, $user->id);
    }
}
