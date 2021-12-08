<?php

namespace Dimsog\Comments;

use Backend;
use Dimsog\Comments\Components\CommentsForm;
use Dimsog\Comments\Components\Comments;
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

    public function registerComponents(): array
    {
        return [
            Comments::class => 'comments',
            CommentsForm::class => 'commentForm'
        ];
    }
}
