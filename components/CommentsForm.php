<?php

namespace Dimsog\Comments\Components;

use Cms\Classes\ComponentBase;

class CommentsForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.components.commentForm.name',
            'description' => 'dimsog.comments::lang.components.commentForm.description'
        ];
    }

    public function defineProperties(): array
    {
        return [
            'url' => [
                'title' => 'dimsog.comments::lang.components.commentForm.properties.url',
                'type' => 'string',
                'required' => true
            ]
        ];
    }
}
