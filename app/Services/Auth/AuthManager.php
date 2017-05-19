<?php

namespace App\Services\Auth;

use App\User;


/**
 * Class AuthManager
 *
 * @package App\Services\Auth
 */
class AuthManager
{
    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @var User|null
     */
    protected $user;

    /**
     * AuthManager constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        if ($this->user) {
            return $this->user;
        }

        if ($token = $this->tokenStorage->getToken()) {
            return $this->user = User::whereToken($token)->first();
        }

        $token = $this->tokenStorage->generateToken();

        return $this->user = User::create(compact('token'));
    }
}
