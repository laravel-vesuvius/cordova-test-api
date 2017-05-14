<?php

namespace App\Services\Auth;


/**
 * Interface TokenStorageInterface
 *
 * @package App\Services\Auth
 */
interface TokenStorageInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return string
     */
    public function generateToken();
}
