<?php

namespace App\Http\Controllers;

use App\User;

class FollowController extends Controller
{
    public function create(User $user)
    {
        auth()->user()->following()->attach($user);

        return redirect()->route('user', $user);
    }

    public function destroy(User $user)
    {
        auth()->user()->following()->detach($user);

        return redirect()->route('user', $user);
    }
}
