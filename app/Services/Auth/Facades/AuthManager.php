<?php

namespace App\Services\Auth\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class AuthManager
 *
 * @package App\Services\Auth
 */
class AuthManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'api.auth';
    }
}
