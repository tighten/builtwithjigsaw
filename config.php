<?php

return [
    'baseUrl' => 'http://builtwithjigsaw.test/',
    'production' => false,
    'collections' => [
        'sites' => [
            'path' => 'sites',
            'sort' => ['-added'],
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
        'blog' => '#3f7703',
        'company' => '#874ec5',
        'docs' => '#bb5b04',
        'meetup' => '#c10000',
        'personal' => '#226bb1',
        'project' => '#026773',
    ],
];
