<?php

return [
    'plugin' => [
        'name' => 'Comments',
        'description' => 'No description'
    ],
    'components' => [
        'comments' => [
            'name' => 'Comments List',
            'description' => '',
            'properties' => [
                'url' => 'URL',
                'tree' => 'Tree',
                'email' => 'Show email',
                'dateformat' => 'Date format',
                'auth' => 'Only for logged in users'
            ],
            'success_message_moderate' => 'Your comment will be visible after approval',
            'success_message' => 'A comment has been added',
            'views' => [
                'empty' => 'No Comments Yet',
                'answer' => 'Answer',
                'your_name' => 'Your name',
                'your_email' => 'Your email',
                'text' => 'Text...',
                'send' => 'Send'
            ],
            'guest_name' => 'Guest',
            'validator' => [
                'auth' => 'Log in to leave a comment',
                'please_install_user_plugin' => 'Auth class not found. Please install an user plugin (for example: winter/wn-user-plugin)'
            ]
        ]
    ],
    'settings' => [
        'name' => 'Comments',
        'moderate' => 'Moderate comments',
        'emailNotification' => 'Email notification',
        'adminEmail' => 'Admin email'
    ],
    'models' => [
        'comment' => [
            'toolbar' => [
                'delete' => 'Delete selected',
                'restore' => 'Restore selected',
                'delete_confirm' => 'Are you sure you want to delete the selected comments?',
                'restore_confirm' => 'Are you sure you want to restore the selected comments?'
            ],
            'columns' => [
                'id' => 'ID',
                'created_at' => 'Created At',
                'user_name' => 'User name',
                'user_email' => 'User email',
                'url' => 'URL',
                'active' => 'Approved',
                'deleted' => 'Deleted'
            ],
            'fields' => [
                'user_name' => 'User name',
                'user_email' => 'User email',
                'comment' => 'Comment',
                'active' => 'Approved'
            ]
        ]
    ]
];
