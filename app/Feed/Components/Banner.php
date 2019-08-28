<?php

namespace App\Feed\Components;

use Illuminate\Contracts\Support\Arrayable;

class Banner implements ComponentInterface
{
    protected $image;
    protected $album;
    protected $artist;

    public static function create() : ComponentInterface
    {
        return new static;
    }

    public function image(string $image)
    {
        $this->image = $image;

        return $this;
    }

    public function album(string $album)
    {
        $this->album = $album;

        return $this;
    }

    public function artist(string $artist)
    {
        $this->artist = $artist;

        return $this;
    }

    public function build() : array
    {
        return [
            'component' => 'Banner',
            'class' => ['-mx-4', 'mb-6'],
            'props' => [
                'href' => '#',
                'image' => $this->image,
                'album' => $this->album,
                'artist' => $this->artist,
            ],
        ];
    }
}
