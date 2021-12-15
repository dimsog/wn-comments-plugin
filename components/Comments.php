<?php

namespace Dimsog\Comments\Components;

use Dimsog\Comments\Classes\ComponentBase;
use Dimsog\Comments\Classes\CommentsTreeGenerator;
use Dimsog\Comments\Models\Comment;

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
        $group = $this->findOrCreateNewGroup();
        $this->comments = (new CommentsTreeGenerator(Comment::findCommentsFromGroupId($group->id)))->generate();
    }

    public function onRender()
    {
        $this->page['comments'] = $this->comments;
        $this->page['tree'] = $this->property('tree');
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
            ]
        ];
    }
}
