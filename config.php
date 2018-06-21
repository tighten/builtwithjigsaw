<?php

return [
    'baseUrl' => 'http://builtwithjigsaw.test/',
    'production' => false,
    'collections' => [
        'sites' => [
            'path' => 'sites',
            'sort' => ['-added','title'],
            'image' => function ($site) {
                $imagePath = '/assets/images/sites/' . $site->_meta->filename . '.png';
                return file_exists(getcwd() . '/source' . $imagePath) ? $imagePath : '/assets/images/blank-site.png';
            }
        ],
        'articles' => [
            'path' => 'articles',
            'sort' => ['-published'],
        ],
    ],
    'typeColors' => [
        'blog' => '#A5D66F',
        'company' => '#956CC3',
        'docs' => '#FFC248',
        'meetup' => '#F8E71C', // @todo get real color
        'personal' => '#589EE0',
        'project' => '#50E3C2', // @todo get real color
    ],
];
