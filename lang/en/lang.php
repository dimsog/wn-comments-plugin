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
                'dateformat' => 'Date format',
                'onlyActive' => 'Only active comments'
            ]
        ],
        'commentsForm' => [
            'name' => 'CommentsForm',
            'description' => '',
            'properties' => [
                'url' => 'URL',
                'email' => 'Show email',
                'moderate' => 'Moderate comments'
            ]
        ]
    ]
];
