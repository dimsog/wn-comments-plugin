<?php

return [
    'plugin' => [
        'name' => 'Comments',
        'description' => 'No description'
    ],
    'components' => [
        'comments' => [
            'name' => 'Comments List',
            'description' => ''
        ],
        'commentsForm' => [
            'name' => 'CommentsForm',
            'description' => '',
            'properties' => [
                'url' => 'URL',
                'email' => 'Show email'
            ]
        ]
    ]
];
