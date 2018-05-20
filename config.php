<?php

return [
    'baseUrl' => 'http://builtwithjigsaw.test/',
    'production' => false,
    'collections' => [
        'sites' => [
            'path' => 'sites',
            'sort' => ['-added','title'],
        ],
        'articles' => [
            'path' => 'articles',
            'sort' => ['-published'],
        ],
    ],
];
