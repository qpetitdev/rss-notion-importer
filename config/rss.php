<?php

use App\Services\Mappers\LaravelNewsRssMapper;

return [
    'sources' => [
        'laravel_news' => [
            'url' => 'https://feed.laravel-news.com/',
            'mapper' => LaravelNewsRssMapper::class,
        ],
    ],
];
