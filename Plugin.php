<?php

namespace Dimsog\Comments;

use Backend;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.plugin.name',
            'description' => 'dimsog.comments::lang.plugin.description',
            'author'      => 'Dimsog',
            'icon'        => 'icon-comments'
        ];
    }

    public function registerNavigation(): array
    {
        return [];
    }
}
