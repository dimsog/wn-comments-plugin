<?php

namespace Dimsog\Comments\Components;

use Dimsog\Comments\Classes\ComponentBase;
use Dimsog\Comments\Classes\CommentsTreeGenerator;
use Dimsog\Comments\Models\Comment;
use Dimsog\Comments\Models\Settings;

class Comments extends ComponentBase
{
    private $comments = [];


    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.components.comments.name',
            'description' => 'dimsog.comments::lang.components.comments.description'
        ];
    }

    public function onRun()
    {
        $this->controller->addJs('/plugins/dimsog/comments/assets/script.js');
        $this->controller->addCss('/plugins/dimsog/comments/assets/style.css');
        $group = $this->findOrCreateNewGroup();
        $comments = Comment::findCommentsFromGroupId($group->id, Settings::isModerateComments());
        $this->comments = (new CommentsTreeGenerator($comments))->generate();
    }

    public function onRender()
    {
        $this->page['comments'] = $this->renderPartial('@list', [
            'comments' => $this->comments,
            'parentId' => 0,
            'tree' => $this->property('tree'),
            'dateformat' => $this->property('dateformat')
        ]);
    }

    public function defineProperties(): array
    {
        return [
            'url' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.url',
                'type' => 'string',
                'required' => false
            ],
            'tree' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.tree',
                'type' => 'checkbox',
                'default' => true
            ],
            'dateformat' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.dateformat',
                'type' => 'string',
                'default' => 'd.m.Y H:i'
            ]
        ];
    }
}
