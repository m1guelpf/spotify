<?php

namespace App\Feed;

use App\Feed\Components\ComponentInterface;

class Builder
{
    public function create(array $content)
    {
        return collect($content)->map(function($item) {
            return $item instanceof ComponentInterface ? $item->build() : $item;
        });
    }
}
