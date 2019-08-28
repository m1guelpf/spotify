<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user = null)
    {
        return Inertia::render('Profile')->with('user', ($user ?? auth()->user())->load('comments'));
    }
}
