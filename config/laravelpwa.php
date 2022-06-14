<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => env('APP_NAME', 'My PWA App'),
        'start_url' => route('user.index'),
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'potrait',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/72.png',
                'purpose' => 'any'
            ],
            '87x87' => [
                'path' => '/images/icons/87.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/192.png',
                'purpose' => 'any'
            ],
            '256x256' => [
                'path' => '/images/icons/256.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash/640x1136.png',
            '750x1334' => '/images/icons/splash/750x1334.png',
            '828x1792' => '/images/icons/splash/828x1792.png',
            '1125x2436' => '/images/icons/splash/1125x2436.png',
            '1242x2208' => '/images/icons/splash/1242x2208.png',
            '1242x2688' => '/images/icons/splash/1242x2688.png',
            '1536x2048' => '/images/icons/splash/1536x2048.png',
            '1668x2224' => '/images/icons/splash/1668x2224.png',
            '1668x2388' => '/images/icons/splash/1668x2388.png',
            '2048x2732' => '/images/icons/splash/2048x2732.png',
        ],
        'shortcuts' => [
            // [
            //     'name' => 'Shortcut Link 1',
            //     'description' => 'Shortcut Link 1 Description',
            //     'url' => '/shortcutlink1',
            //     'icons' => [
            //         "src" => "/images/icons/icon-72x72.png",
            //         "purpose" => "any"
            //     ]
            // ],
            // [
            //     'name' => 'Shortcut Link 2',
            //     'description' => 'Shortcut Link 2 Description',
            //     'url' => '/shortcutlink2'
            // ]
        ],
        'custom' => []
    ]
];
