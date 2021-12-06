<?php

namespace Dimsog\Comments\Components;

use Cms\Classes\ComponentBase;

class CommentForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'        => 'CommentForm Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties(): array
    {
        return [];
    }
}
