<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes;

use Dimsog\Comments\Models\Comment;

class UnreadCommentsCalculator
{
    public static function calculate(): int
    {
        return Comment::where('is_backend_viewed', 0)
            ->count();
    }
}