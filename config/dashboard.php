<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Learning Resources
    |--------------------------------------------------------------------------
    |
    | This contains links to frequently used learning resources. You can also
    | provide a font awesome icon to be shown alongside its title.
    |
    */

    'resources' => [
        [
            'title' => 'GitHub',
            'link' => 'https://github.com',
            'icon' => 'fab fa-github'
        ],
        [
            'title' => 'Laracasts',
            'link' => 'https://laracasts.com/',
            'icon' => 'fab fa-laravel',
        ],
        [
            'title' => 'Scrimba',
            'link' => 'https://scrimba.com',
            'icon' => 'fab fa-css3-alt',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Library Docs.
    |--------------------------------------------------------------------------
    |
    | This contains links to frequently used library documentation. You can also
    | provide a font awesome icon to be shown alongside its title.
    |
    */

    'docs' => [
        [
            'title' => 'Laravel',
            'link' => 'https://laravel.com/docs/5.6',
            'icon' => 'fab fa-laravel',
        ],
        [
            'title' => 'React',
            'link' => 'https://reactjs.org/docs/',
            'icon' => 'fab fa-react'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Podcast RSS Feeds
    |--------------------------------------------------------------------------
    |
    | Here you can specify RSS feeds for your favourite podcasts. Feeds will be
    | created from the given values.
    |
    */

    'podcasts' => [
        'https://responsivewebdesign.com/podcast/feed.xml',
        'https://softwareengineeringdaily.com/feed/podcast/',
        'http://www.pwop.com/feed.aspx?show=dotnetrocks&filetype=master',
    ],

    /*
    |--------------------------------------------------------------------------
    | Podcast Item Count
    |--------------------------------------------------------------------------
    |
    | Here you can specify how many items are returned from each podcast RSS
    | feed.
    |
    */

    'item_count' => 2,

    /*
    |--------------------------------------------------------------------------
    | Youtube Channels
    |--------------------------------------------------------------------------
    |
    | Here you can specify Youtube channels to subscribe to. The channel ID
    | or channel name can be used. For example in
    | youtube.com/channel/UCKuHFYu3smtrl2AwwMOXOlg/videos
    | UCKuHFYu3smtrl2AwwMOXOlg will be used.
    |
    */

    'channels' => [
        'DevTipsForDesigners',
    ],

    /*
    |--------------------------------------------------------------------------
    | Youtube Video Count
    |--------------------------------------------------------------------------
    |
    | Here you can specify how many videos are returned per channel.
    |
    */

    'video_count' => 1,
];
