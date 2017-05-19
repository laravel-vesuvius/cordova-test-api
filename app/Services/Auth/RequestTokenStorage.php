<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;


/**
 * Class SessionTokenStorage
 *
 * @package App\Services\Auth
 */
class RequestTokenStorage implements TokenStorageInterface
{
    /**
     * @var string
     */
    protected $tokenKey = 'auth-token';

    /**
     * @var Request
     */
    protected $request;


    /**
     * RequestTokenStorage constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        return $this->request->header($this->tokenKey);
    }

    /**
     * @inheritdoc
     */
    public function generateToken()
    {
        return uniqid('', true);
    }
}
