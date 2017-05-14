<?php

namespace Tests\Unit\Services\Auth;


use App\Services\Auth\RequestTokenStorage;
use Illuminate\Http\Request;
use Tests\TestCase;

class RequestTokenStorageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetToken()
    {
        $request = $this->getMockBuilder(Request::class)->getMock();

        $request->expects($this->any())
            ->method('header')
            ->willReturn('token');

        $tokenStorage = new RequestTokenStorage($request);

        $this->assertEquals('token', $tokenStorage->getToken());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGenerateToken()
    {
        $request = $this->getMockBuilder(Request::class)->getMock();

        $tokenStorage = new RequestTokenStorage($request);

        $this->assertTrue(is_string($tokenStorage->generateToken()));
    }
}
