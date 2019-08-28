<?php

namespace App\Feed\Components;

use Illuminate\Database\Eloquent\Collection;

class CommentScroll implements ComponentInterface
{
    protected $comments;

    public function comments(Collection $comments)
    {
        $this->comments = $comments;

        return $this;
    }

    public static function create() : ComponentInterface
    {
        return new static;
    }

    public function build() : array
    {
        return [
            'component' => 'CommentScroll',
            'class' => ['mb-6', '-mr-4'],
            'props' => [
                'comments' => $this->comments->toArray(),
            ],
        ];
    }
}
