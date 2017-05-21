<?php

namespace Tests\Feature;


use App\Pin;
use App\User;
use Tests\TestCase;

class PinControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetPins()
    {
        $user = factory(User::class)
            ->create();

        $pin = factory(Pin::class)->make();
        $user->pins()->save($pin);

        $response = $this->get('/api/pins', ['auth-token' => $user->token]);

        $response->assertJson([
            'pins' => [
                [
                    'lat' => $pin->lat,
                    'lng' => $pin->lng,
                    'country' => $pin->country,
                    'city' => $pin->city,
                    'formatted_address' => $pin->formatted_address,
                ]
            ]
        ]);
    }

    /**
     * @return void
     */
    public function testCreatePin()
    {
        $user = factory(User::class)->create();

        $pin = factory(Pin::class)->make();

        $data = [
            'lat' => $pin->lat,
            'lng' => $pin->lng,
            'country' => $pin->country,
            'city' => $pin->city,
            'formatted_address' => $pin->formatted_address,
        ];

        $response = $this->post(
            '/api/pins',
            ['pin' => $data],
            ['auth-token' => $user->token]
        );

        $this->assertDatabaseHas('pins', ['lat' => $pin->lat, 'lng' => $pin->lng, 'user_id' => $user->id]);

        $response->assertJson([
            'pin' => $data
        ]);
    }
}
