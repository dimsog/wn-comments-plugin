<?php

namespace Dimsog\Comments\Components;

use Cms\Classes\ComponentBase;
use Dimsog\Comments\Models\Comment;
use Dimsog\Comments\Models\CommentGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorInterface;
use Winter\Storm\Exception\AjaxException;

class CommentsForm extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.components.commentsForm.name',
            'description' => 'dimsog.comments::lang.components.commentsForm.description'
        ];
    }

    public function onRender()
    {
        $this->page['properties'] = $this->properties;
    }

    public function onCommentStore()
    {
        $this->validateOrFail();
        $group = $this->findOrCreateNewGroupFromRequest();
        $model = new Comment();
        $model->group_id = $group->id;
        $model->user_name = post('name');
        $model->user_email = post('email');
        $model->comment = post('comment');
        $model->save();

        return [
            '#' . $this->alias . '-flash' => $this->renderPartial('@flash/success.htm', [
                'message' => 'A comment has been added.'
            ])
        ];
    }

    public function defineProperties(): array
    {
        return [
            'url' => [
                'title' => 'dimsog.comments::lang.components.commentsForm.properties.url',
                'type' => 'string',
                'required' => true
            ],
            'email' => [
                'title' => 'dimsog.comments::lang.components.commentsForm.properties.email',
                'type' => 'checkbox',
                'default' => true
            ]
        ];
    }

    private function validateOrFail(): void
    {
        $validator = $this->makeValidator(post());
        if ($validator->fails()) {
            throw new AjaxException([
                '#' . $this->alias . '-flash' => $this->renderPartial('@flash/errors.htm', [
                    'errors' => $validator->errors()->all()
                ])
            ]);
        }
    }

    private function findOrCreateNewGroupFromRequest(): CommentGroup
    {
        $url = $this->property('url');
        if (empty($this->url)) {
            $url = request()->path();
        }
        return CommentGroup::firstOrCreate([
            'url' => $url
        ]);
    }

    private function makeValidator(array $data): ValidatorInterface
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string'
        ];
        if ($this->property('email') == false) {
            unset($rules['email']);
        }
        return Validator::make($data, $rules);
    }
}
