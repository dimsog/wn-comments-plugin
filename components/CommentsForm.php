<?php

namespace Dimsog\Comments\Components;

use Dimsog\Comments\Classes\ComponentBase;
use Dimsog\Comments\Models\Comment;
use Dimsog\Comments\Models\CommentGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorInterface;
use Illuminate\Validation\Rule;
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
        $group = $this->findOrCreateNewGroup();
        $model = new Comment();
        $model->parent_id = (int) post('parent_id', 0);
        $model->group_id = $group->id;
        $model->user_name = post('name');
        $model->user_email = post('email');
        $model->comment = post('comment');
        $model->active = $this->property('moderate') ? 0 : 1;
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
                'required' => false
            ],
            'email' => [
                'title' => 'dimsog.comments::lang.components.commentsForm.properties.email',
                'type' => 'checkbox',
                'default' => true
            ],
            'moderate' => [
                'title' => 'dimsog.comments::lang.components.commentsForm.properties.moderate',
                'type' => 'checkbox',
                'default' => false
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

    private function makeValidator(array $data): ValidatorInterface
    {
        $rules = [
            'parent_id' => [
                'sometimes',
                Rule::exists('dimsog_comments')
                    ->where('active', 1)
            ],
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
