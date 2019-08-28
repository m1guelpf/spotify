<?php

namespace App\Spotify;

use GuzzleHttp\Exception\RequestException;
use Zttp\PendingZttpRequest;
use Zttp\ZttpResponse;

class Client
{
    protected $client;

    public function __construct()
    {
        $this->client = new PendingZttpRequest;

        auth()->check() ? $this->authenticateFor(auth()->user()) : null;
    }

    public function authenticate(string $token) : self
    {
        return tap($this, function() use($token) {
            $this->client->withHeaders(['Authorization' => "Bearer $token"]);
        });
    }

    public function authenticateFor(\App\User $user) : self
    {
        return $this->authenticate($user->spotify_token);
    }

    public function getUserPlaylists(\App\User $user = null)
    {
        $user = $user ?? auth()->user();

        return $this->processResponse(
            $this->client->get("https://api.spotify.com/v1/users/{$user->id}/playlists", [
                'limit' => 50,
            ])
        );
    }

    protected function processResponse(ZttpResponse $response)
    {
        throw_unless($response->isOk(), new \RuntimeException('Request to Spotify failed'));

        return $response->json()['items'];
    }
}
