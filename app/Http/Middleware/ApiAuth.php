<?php

namespace App\Http\Middleware;


use TokenAuth;
use Closure;

/**
 * Class ApiAuth
 *
 * @package App\Http\Middleware
 */
class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);
        $response->headers->set('auth-token', TokenAuth::getUser()->token);

        return $response;
    }
}
