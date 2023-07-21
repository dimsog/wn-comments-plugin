<?php

declare(strict_types=1);

namespace Dimsog\Comments\Controllers;

use Backend\Facades\Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Dimsog\Comments\Models\Comment;
use Illuminate\Http\Request;
use Winter\Storm\Database\Builder;

/**
 * Comments Back-end Controller
 */
final class Comments extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Dimsog.Comments', 'comments', 'comments');
    }

    public function listExtendQuery(Builder $query): void
    {
        $query->withTrashed();
    }

    public function formExtendQuery(Builder $query): void
    {
        $query->withTrashed();
    }

    public function listInjectRowClass(Comment $model): string
    {
        $classes = [];
        if (!$model->is_backend_viewed) {
            $classes[] = 'd-backend-comment-unviewed';
        }
        if ($model->active) {
            $classes[] = 'd-backend-comment-approved';
        }
        if (!empty($model->deleted_at)) {
            $classes[] = 'd-backend-comment-deleted';
        }
        return implode(' ', $classes);
    }

    public function update($recordId = null, $context = null): void
    {
        parent::update($recordId, $context);
        /** @var Comment|null $comment */
        $comment = Comment::find((int) $recordId);
        if (!empty($comment) && !$comment->is_backend_viewed) {
            $comment->markCommentAsBackendViewed();
        }
    }

    public function onRestore()
    {
        foreach (post('checked', []) as $commentId) {
            $model = Comment::where('id', (int) $commentId)->withTrashed()->first();
            $model->restore();
        }
        return Backend::redirect('dimsog/comments/comments');
    }
}
