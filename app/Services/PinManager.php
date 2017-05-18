<?php

namespace App\Services;


use App\Pin;
use App\User;

/**
 * Class PinManager
 *
 * @package App\Services
 */
class PinManager
{
    /**
     * @param User $user
     * @param $data
     *
     * @return Pin
     */
    public function createPinForUser(User $user, $data)
    {
        $pin = new Pin($data);
        $user->pins()->save($pin);

        return $pin;
    }
}
