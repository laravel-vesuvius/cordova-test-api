<?php

namespace Tests\Unit\Services\Auth;


use App\Http\Middleware\ApiAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;
use TokenAuth;

class ApiAuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHandle()
    {
        $user = TokenAuth::getUser();

        $request = Request::create('http://example.com/', 'GET');

        $middleware = new ApiAuth();
        $response = $middleware->handle($request, function () {
            return new Response();
        });

        $this->assertEquals($user->token, $response->headers->get('auth-token'));
    }
}
