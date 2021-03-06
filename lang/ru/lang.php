<?php

return [
    'plugin' => [
        'name' => 'Комментарии',
        'description' => 'Нет описания'
    ],
    'components' => [
        'comments' => [
            'name' => 'Список комментариев',
            'description' => '',
            'properties' => [
                'url' => 'URL',
                'tree' => 'Дерево комментариев',
                'email' => 'Показывать поле Email',
                'dateformat' => 'Формат даты'
            ],
            'success_message_moderate' => 'Ваш комментарий будет опубликован для всех после проверки',
            'success_message' => 'Комментарий добавлен',
            'views' => [
                'empty' => 'Нет комментариев',
                'deleted' => 'Комментарий удален',
                'answer' => 'Ответить',
                'your_name' => 'Ваше имя',
                'your_email' => 'Ваш email',
                'text' => 'Текст комментария',
                'send' => 'Отправить'
            ],
            'guest_name' => 'Гость'
        ]
    ],
    'settings' => [
        'name' => 'Комментарии',
        'moderate' => 'Публиковать комментарии после модерации'
    ],
    'models' => [
        'comment' => [
            'columns' => [
                'id' => 'ID',
                'created_at' => 'Дата создания',
                'user_name' => 'Имя',
                'user_email' => 'Email',
                'url' => 'URL',
                'active' => 'Опубликовано',
                'deleted' => 'Удалено'
            ],
            'fields' => [
                'user_name' => 'Имя пользователя',
                'user_email' => 'Email',
                'comment' => 'Текст комментария'
            ]
        ]
    ]
];
