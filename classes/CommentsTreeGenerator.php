<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes;

use Illuminate\Database\Eloquent\Collection;

class CommentsTreeGenerator
{
    public function __construct(
        private Collection $comments
    )
    {
    }

    public function generate(): array
    {
        $result = [];
        foreach ($this->comments as $comment) {
            $result[$comment->parent_id][] = $comment;
        }
        return $result;
    }
}
