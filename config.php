<?php

return [
    'baseUrl' => 'http://builtwithjigsaw.test',
    'production' => false,
    'collections' => [
        'sites' => [
            'path' => 'sites',
            'sort' => '-added',
            'image' => function ($site) {
                $source = getcwd() . '/source';

                foreach (['webp', 'avif', 'png'] as $ext) {
                    $path = sprintf("/assets/images/sites/%s.%s", $site->_meta->filename, $ext);

                    if (file_exists($source . $path)) {
                        return $path;
                    }
                }

                return '/assets/images/blank-site.png';
            },
        ],
        'articles' => [
            'path' => 'articles',
            'sort' => '-published',
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
