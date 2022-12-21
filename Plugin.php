<?php

declare(strict_types=1);

namespace Dimsog\Comments;

use Backend;
use Dimsog\Comments\Components\CommentsForm;
use Dimsog\Comments\Components\Comments;
use Dimsog\Comments\Models\Settings;
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
        return [
            'comments' => [
                'label'       => 'dimsog.comments::lang.plugin.name',
                'url'         => Backend::url('dimsog/comments/comments'),
                'icon'        => 'icon-comments',
                'permissions' => ['*'],
                'order'       => 500,
                'sideMenu' => [
                    'comments' => [
                        'label'       => 'dimsog.comments::lang.plugin.name',
                        'icon'        => 'icon-comments',
                        'url'         => Backend::url('dimsog/comments/comments'),
                    ]
                ]
            ]
        ];
    }

    public function registerSettings(): array
    {
        return [
            'comments' => [
                'label' => 'dimsog.comments::lang.settings.name',
                'description' => '',
                'category' => 'dimsog.comments::lang.settings.name',
                'icon' => 'icon-comments',
                'class' => Settings::class,
                'order' => 500,
                'keywords' => 'comments',
                'permissions' => []
            ]
        ];
    }

    public function registerComponents(): array
    {
        return [
            Comments::class => 'comments'
        ];
    }
}
