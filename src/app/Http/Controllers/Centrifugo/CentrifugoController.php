<?php

namespace App\Http\Controllers\Centrifugo;

use App\Http\Controllers\Controller;

/**
 * Class CentrifugoController
 */
class CentrifugoController extends Controller
{
    public function token()
    {
        $current_time = time();
        $user_id = '1';

        $client = new \phpcent\Client("centrifugo:8000/api");


        return [
            'url'       => 'ws://localhost:888/connection/websocket',
            'user'      => $user_id,
            'info'      => '',
            'timestamp' => (string)$current_time,
            'token'     => $client->setSecret("cf8b594b-ec4d-409f-86f4-fc4b067e1098")->generateConnectionToken($user_id)
        ];

    }
}
