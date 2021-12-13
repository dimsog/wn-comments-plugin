<?php

namespace Dimsog\Comments\Components;

use Cms\Classes\ComponentBase;

class Comments extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.components.comments.name',
            'description' => 'dimsog.comments::lang.components.comments.description'
        ];
    }

    public function defineProperties(): array
    {
        return [
            'url' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.url',
                'type' => 'string',
                'required' => true
            ],
        ];
    }
}
