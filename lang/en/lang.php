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
                'dateformat' => 'Date format'
            ]
        ],
        'commentsForm' => [
            'name' => 'CommentsForm',
            'description' => '',
            'properties' => [
                'url' => 'URL',
                'email' => 'Show email'
            ],
            'success_message_moderate' => 'Your comment will be visible after approval',
            'success_message' => 'A comment has been added'
        ]
    ],
    'settings' => [
        'name' => 'Comments',
        'moderate' => 'Moderate comments'
    ],
    'models' => [
        'comment' => [
            'columns' => [
                'id' => 'ID',
                'created_at' => 'Created At',
                'user_name' => 'User name',
                'user_email' => 'User email',
                'url' => 'URL',
                'active' => 'Active',
                'deleted' => 'Deleted'
            ]
        ]
    ]
];
