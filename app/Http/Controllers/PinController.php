<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreatePin;
use App\Pin;

/**
 * Class PinController
 *
 * @package App\Http\Controllers
 */
class PinController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return ['pins' => \TokenAuth::getUser()->pins];
    }

    /**
     * @param CreatePin $request
     *
     * @return mixed
     */
    public function create(CreatePin $request)
    {
        $pin = \TokenAuth::getUser()->pins()->save(new Pin($request->all()));

        return compact('pin');
    }
}
