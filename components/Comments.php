<?php

declare(strict_types=1);

namespace Dimsog\Comments\Components;

use Backend\Facades\Backend;
use Cms\Classes\ComponentBase;
use Dimsog\Comments\Classes\CommentsTreeGenerator;
use Dimsog\Comments\Classes\UserProvider;
use Dimsog\Comments\Models\Comment;
use Dimsog\Comments\Models\CommentGroup;
use Dimsog\Comments\Models\Settings;
use Illuminate\Contracts\Validation\Validator as ValidatorInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Winter\Storm\Exception\AjaxException;
use Illuminate\Support\Facades\Mail;

class Comments extends ComponentBase
{
    private UserProvider $userProvider;


    public function componentDetails(): array
    {
        return [
            'name'        => 'dimsog.comments::lang.components.comments.name',
            'description' => 'dimsog.comments::lang.components.comments.description'
        ];
    }

    public function init(): void
    {
        $this->userProvider = new UserProvider();
    }

    public function onRun()
    {
        $this->controller->addJs('/plugins/dimsog/comments/assets/script.js', 'Dimsog.Comments');
        $this->controller->addCss('/plugins/dimsog/comments/assets/style.css', 'Dimsog.Comments');
    }

    public function onRender()
    {
        $this->page['onlyForAuthUsers'] = $this->needAuth();
        $this->page['userPluginIsExists'] = $this->userProvider->checkUserPluginIsExists();
        $this->page['userIsGuest'] = $this->userProvider->isGuest();
        $this->page['showCommentsForm'] = $this->showCommentsForm();
        $this->page['comments'] = $this->renderComments();
        $this->page['properties'] = $this->properties;
    }

    public function onCommentStore(): array
    {
        $this->validateOrFail();
        $group = $this->findOrCreateNewGroup();
        $model = new Comment();
        $model->parent_id = (int) post('parent_id', 0);
        $model->group_id = $group->id;
        if ($this->needAuth() && !$this->userProvider->isGuest()) {
            $model->user_id = $this->userProvider->getUserId();
            $model->user_name = $this->userProvider->getUserName();
            $model->user_email = $this->userProvider->getUserEmail();
        } else {
            $model->user_name = post('name');
            $model->user_email = post('email');
        }
        $model->comment = post('comment');
        $model->active = Settings::isModerateComments() ? 0 : 1;
        if ($model->save() && Settings::isEmailNotification() && !empty(Settings::getAdminEmail())) {
            Mail::sendTo(Settings::getAdminEmail(), 'dimsog.comments::mail.new_comment', [
                'model' => $model,
                'approve_url' => Backend::url('dimsog/comments/comments/update/' . $model->id)
            ]);
        }

        return [
            '#' . $this->alias . '-flash' => $this->renderPartial('@flash/success.htm', [
                'message' => $this->getSuccessMessage()
            ]),
            '#' . $this->alias . '-comments-list' => $this->renderComments(),
            '#' . $this->alias . '-count' => $this->countActiveCommentsFromCurrentPage()
        ];
    }

    public function countActiveCommentsByUrl(string $url): int
    {
        return Comment::countActiveCommentsByUrl($url);
    }

    public function countActiveCommentsFromCurrentPage(): int
    {
        return $this->countActiveCommentsByUrl($this->getUrl());
    }

    public function count(?string $url = null): int
    {
        if (empty($url)) {
            return $this->countActiveCommentsFromCurrentPage();
        }
        return $this->countActiveCommentsByUrl($url);
    }

    public function defineProperties(): array
    {
        return [
            'tree' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.tree',
                'type' => 'checkbox',
                'default' => true
            ],
            'url' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.url',
                'type' => 'string',
                'required' => false
            ],
            'email' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.email',
                'type' => 'checkbox',
                'default' => true
            ],
            'dateformat' => [
                'title' => 'dimsog.comments::lang.components.comments.properties.dateformat',
                'type' => 'string',
                'default' => 'd.m.Y H:i'
            ],
            'auth' => [
                'title' => 'dimsog.comments.lang.components.comments.properties.auth',
                'type' => 'boolean',
                'default' => false
            ]
        ];
    }

    private function getUrl(): string
    {
        $url = $this->property('url');
        if (empty($url)) {
            $url = request()->path();
        }
        return $url;
    }

    private function findOrCreateNewGroup(): CommentGroup
    {
        return CommentGroup::firstOrCreate([
            'url' => $this->getUrl()
        ]);
    }

    private function makeValidator(array $data): ValidatorInterface
    {
        $rules = [
            'parent_id' => [
                'sometimes',
                Rule::exists('dimsog_comments', 'id')
                    ->where(function ($query) {
                        $query->where('active', 1);
                    })
            ],
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string'
        ];
        if ($this->property('email') == false) {
            unset($rules['email']);
        }
        if ($this->needAuth() && !$this->userProvider->isGuest()) {
            unset($rules['name']);
            unset($rules['email']);
        }
        return Validator::make($data, $rules);
    }

    private function validateOrFail(): void
    {
        if ($this->needAuth()) {
            if (!$this->userProvider->checkUserPluginIsExists()) {
                $this->throwAjaxException(trans('dimsog.comments::lang.components.comments.validator.please_install_user_plugin'));
            }
            if ($this->userProvider->isGuest()) {
                $this->throwAjaxException(trans('dimsog.comments::lang.components.comments.validator.auth'));
            }
        }
        $validator = $this->makeValidator(post());
        if ($validator->fails()) {
            $this->throwAjaxExceptionFromErrorsArray($validator->errors()->all());
        }
    }

    private function getSuccessMessage(): string
    {
        if (Settings::isModerateComments()) {
            return __('dimsog.comments::lang.components.comments.success_message_moderate');
        }
        return __('dimsog.comments::lang.components.comments.success_message');
    }

    private function renderComments(): string
    {
        $group = $this->findOrCreateNewGroup();
        $comments = Comment::findCommentsFromGroupId($group->id);

        return $this->renderPartial('@list', [
            'comments' => (new CommentsTreeGenerator($comments))->generate(),
            'parentId' => 0,
            'tree' => $this->property('tree'),
            'dateformat' => $this->property('dateformat')
        ]);
    }

    private function needAuth(): bool
    {
        return $this->property('auth') == true;
    }

    private function throwAjaxException(string $message): void
    {
        $this->throwAjaxExceptionFromErrorsArray([$message]);
    }

    private function throwAjaxExceptionFromErrorsArray(array $errors): void
    {
        throw new AjaxException([
            '#' . $this->alias . '-flash' => $this->renderPartial('@flash/errors.htm', [
                'errors' => $errors
            ])
        ]);
    }

    private function showCommentsForm(): bool
    {
        if (!$this->needAuth()) {
            return true;
        }
        return !$this->userProvider->isGuest();
    }
}
