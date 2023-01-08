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
                'dateformat' => 'Формат даты',
                'auth' => 'Только для вошедших пользователей'
            ],
            'success_message_moderate' => 'Ваш комментарий будет опубликован для всех после проверки',
            'success_message' => 'Комментарий добавлен',
            'views' => [
                'empty' => 'Нет комментариев',
                'answer' => 'Ответить',
                'your_name' => 'Ваше имя',
                'your_email' => 'Ваш email',
                'text' => 'Текст комментария',
                'send' => 'Отправить',
                'form_disabled' => 'Форма комментариев была отключена',
                'please_login' => 'Войдите, чтобы оставить комментарий'
            ],
            'guest_name' => 'Гость',
            'validator' => [
                'auth' => 'Войдите, чтобы оставить комментарий',
                'please_install_user_plugin' => 'Класс Auth не найден. Пожалуйста установите плагин пользователей (например: winter/wn-user-plugin)'
            ]
        ]
    ],
    'settings' => [
        'name' => 'Комментарии',
        'moderate' => 'Публиковать комментарии после модерации',
        'emailNotification' => 'Уведомления по email',
        'adminEmail' => 'Электронная почта админа'
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
                'user_id' => 'ID пользователя',
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
