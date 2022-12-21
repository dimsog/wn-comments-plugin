<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes;

use Illuminate\Database\Eloquent\Collection;

class CommentsTreeGenerator
{
    private $comments;


    public function __construct(Collection $comments)
    {
        $this->comments = $comments;
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
