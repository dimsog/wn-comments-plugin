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
            'toolbar' => [
                'delete' => 'Удалить выбранные',
                'restore' => 'Восстановить выбранные',
                'delete_confirm' => 'Вы действительно хотите удалить выбранные комментарии?',
                'restore_confirm' => 'Вы действительно хотите восстановить выбранные комментарии?'
            ],
            'columns' => [
                'id' => 'ID',
                'created_at' => 'Дата создания',
                'user_name' => 'Имя',
                'user_email' => 'Email',
                'url' => 'URL',
                'active' => 'Одобрен',
                'deleted' => 'Удалено'
            ],
            'fields' => [
                'user_name' => 'Имя пользователя',
                'user_email' => 'Email',
                'comment' => 'Текст комментария',
                'active' => 'Комментарий одобрен'
            ]
        ]
    ]
];
