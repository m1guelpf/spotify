<?php

namespace App\Feed\Components;

class Alert implements ComponentInterface
{
    protected $href;
    protected $message;

    public static function create() : ComponentInterface
    {
        return new static;
    }

    public function href(string $href)
    {
        $this->href = $href;

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
            'component' => 'Alert',
            'class' => ['mb-6', '-mx-2'],
            'props' => [
                'href' => '#',
                'href' => $this->href,
                'message' => $this->message,
            ],
        ];
    }
}
