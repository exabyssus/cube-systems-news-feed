<?php

return [
    'tvnet' => [
        'url' => env('FEED_TVNET_URL', 'http://tvnet.lv/rss'),
        'limit' => env('FEED_ITEMS_LIMIT', 50),
        'is_active' => true,
        'ttl' => null, // Default ?
    ],
    'microsoft' => [
        'url' => 'http://blogs.microsoft.com/feed',
        'is_active' => false, // Disable
        'ttl' => null, // Default ?
    ],
];
