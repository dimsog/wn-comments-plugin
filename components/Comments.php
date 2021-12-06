<?php namespace Dimsog\Comments\Components;

use Cms\Classes\ComponentBase;

class Comments extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'        => 'Comments Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties(): array
    {
        return [];
    }
}
