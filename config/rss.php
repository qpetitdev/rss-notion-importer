<?php

use App\Services\Mappers\DevtoVueJsMapperRss;
use App\Services\Mappers\FreekDevRssMapper;
use App\Services\Mappers\GodotEngineRssMapper;
use App\Services\Mappers\HackerNewsRssMapper;
use App\Services\Mappers\LaravelNewsRssMapper;
use App\Services\Mappers\MartinFowlerRssMapper;
use App\Services\Mappers\MattStaufferRssMapper;
use App\Services\Mappers\PhpWeeklyRssMapper;
use App\Services\Mappers\RedditGameDevRssMapper;
use App\Services\Mappers\VuejsRssMapper;

return [
    'sources' => [
        'laravel_news' => [
            'url' => 'https://feed.laravel-news.com/',
            'mapper' => LaravelNewsRssMapper::class,
        ],
        'sticher_io' => [
            'url' => 'https://stitcher.io/rss',
            'mapper' => LaravelNewsRssMapper::class,
        ],
        'php_weekly' => [
            'url' => 'https://www.phpweekly.com/feed/',
            'mapper' => PhpWeeklyRssMapper::class,
        ],
        'freek_dev' => [
            'url' => 'https://freek.dev/feed',
            'mapper' => FreekDevRssMapper::class,
        ],
        'matt_stauffer' => [
            'url' => 'https://mattstauffer.com/blog/feed.atom',
            'mapper' => MattStaufferRssMapper::class,
        ],
        'vue_js' => [
            'url' => 'https://news.vuejs.org/feed.xml',
            'mapper' => VuejsRssMapper::class,
        ],
        'devto_vue_js' => [
            'url' => 'https://dev.to/feed/tag/vue',
            'mapper' => DevtoVueJsMapperRss::class,
        ],
        'godot_engine' => [
            'url' => 'https://godotengine.org/rss.xml',
            'mapper' => GodotEngineRssMapper::class,
        ],
        'reddit_game_dev' => [
            'url' => 'https://www.reddit.com/r/gamedev/.rss',
            'mapper' => RedditGameDevRssMapper::class,
        ],
        'martin_fowler' => [
            'url' => 'https://martinfowler.com/feed.atom',
            'mapper' => MartinFowlerRssMapper::class,
        ],
        'hacker_news' => [
            'url' => 'https://hnrss.org/newest',
            'mapper' => HackerNewsRssMapper::class,
        ],
    ],
];
