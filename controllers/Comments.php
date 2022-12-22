<?php

declare(strict_types=1);

namespace Dimsog\Comments\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Dimsog\Comments\Models\Comment;
use Winter\Storm\Database\Builder;

/**
 * Comments Back-end Controller
 */
class Comments extends Controller
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

    public function listExtendQuery($query)
    {
        $query->withTrashed();
    }

    public function formExtendQuery(Builder $query): void
    {
        $query->withTrashed();
    }

    public function listInjectRowClass(Comment $model): ?string
    {
        if (!$model->is_backend_viewed) {
            return 'dimsog-backend-comment-unviewed';
        }
        return null;
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
}
