<?php

namespace App\Http\Controllers;

use App\Jobs\RefreshPlaylists;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return forceRedirect(Socialite::driver('spotify')->scopes(['user-read-email'])->redirectUrl(route('spotify.callback'))->redirect()->getTargetUrl());
    }

    public function callback()
    {
        try {
            $response = Socialite::driver('spotify')->redirectUrl(route('spotify.callback'))->user();

            $user = User::firstOrNew(['id' => $response->getId()]);

            $user->fill([
                'name' => $response->getName(),
                'email' => $response->getEmail(),
                'avatar' => $response->getAvatar(),
                'spotify_token' => $response->token,
            ]);

            $user->save();

            auth()->login($user);

            RefreshPlaylists::dispatch($user);

            return redirect()->intended();
        } catch(\Exception $e) {
            if($e instanceof \Laravel\Socialite\Two\InvalidStateException || $e instanceof \GuzzleHttp\Exception\ClientException) {
                return redirect()->route('login');
            }

            throw $e;
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
