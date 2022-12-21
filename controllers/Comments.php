<?php

declare(strict_types=1);

namespace Dimsog\Comments\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

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
}
