<?php

namespace Dimsog\Comments;

use Backend;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'Comments',
            'description' => 'No description provided yet...',
            'author'      => 'Dimsog',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerNavigation(): array
    {
        return [];
    }
}
