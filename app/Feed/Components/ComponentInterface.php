<?php

namespace App\Feed\Components;

interface ComponentInterface
{
    public static function create() : ComponentInterface;

    public function build() : array;
}
