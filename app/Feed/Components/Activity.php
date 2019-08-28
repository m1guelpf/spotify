<?php

namespace App\Feed\Components;

use App\User;

class Activity implements ComponentInterface
{
    protected $user;
    protected $message;

    public static function create() : ComponentInterface
    {
        return new static;
    }

    public function user(User $user)
    {
        $this->user = $user;

        return $this;
    }

    public function message(string $message)
    {
        $this->message = $message;

        return $this;
    }

    public function build() : array
    {
        return [
            'component' => 'Activity',
            'props' => [
                'user' => $this->user->toArray(),
                'message' => $this->message,
            ],
        ];
    }
}
